<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:disciplina_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:disciplina_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:disciplina_view', ['only' => ['index']]);
        $this->middleware('permission:disciplina_inactive', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Disciplina::info()
        ->orderBy('nome')
        ->with('curso')
        ->paginate(10);
        return view('disciplina.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Curso::select('id', 'nome as name')
        ->where('cursos.ativo', 1)
        ->get();
        return view('disciplina.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DB::transaction(function() use ($request) {
                $input = $request->except('_token');
                $item = Curso::findOrFail($request->input('curso'));
                $input['curso_id'] = $item->id;
                Disciplina::create($input);
            });
            return redirect()->route('disciplina.index')->withStatus('Registro Adicionado com Sucesso');
        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::select('id','nome as name')
        ->where('cursos.ativo', 1)
        ->orderBy('nome')
        ->get();
        $item = Disciplina::findOrFail($id);
        return view('disciplina.edit', compact('item', 'curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome' => 'required|max:50',
            'curso' => 'required'
        ]);
        try {
            DB::transaction(function() use ($request, $id) {
                $input = $request->except('_token');
                $curso = Curso::findOrFail($request->input('curso'));
                $input['curso_id'] = $curso->id;
                $item = Disciplina::findOrFail($id);
                $item->fill($input);
                $item->save();
            });
            return redirect()->route('disciplina.index')->withStatus('Registro atualizado com sucesso');
            } 
            catch (Exception $e) {
                return redirect()->route('disciplina.edit')->withError('Erro adicionado com sucesso');
            }
    }

    public function status($id)
    {
        try{

            $item = Disciplina::findOrFail($id);
            if ($item->ativo == 1){
                $item->fill(['ativo' => 0])->save();
                return redirect()->route('disciplina.index')->withStatus('Disciplina '.$item->nome.' desativada com sucesso');
            } else {
                $item->fill(['ativo' => 1])->save();
                return redirect()->route('disciplina.index')->withStatus('Disciplina '.$item->nome.' ativada com sucesso');
            }
        }
        catch(Exception $e){
            return redirect()->route('disciplina.index')->withError('Erro ao Fazer Alterações');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
