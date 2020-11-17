<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
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
        $curso = Curso::select('id', 'nome as name')->get();
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
            try {
                $input = $request->except('_token');
                $item = Curso::findOrFail($request->input('curso'));
                $input['curso_id'] = $item->id;
                Disciplina::create($input);
            } catch (Exception $e) {
                return redirect()->route('disciplina.create')->withError('Erro adicionado com sucesso');
            }
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
        $curso = Curso::select('id','nome as name')->orderBy('nome')->get();
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
        $item = Disciplina::findOrFail($id);
        $item->fill($request->all());
        $item->save();
        return redirect()->route('disciplina.index')->withStatus('Registro Adicionado com Sucesso');
    }

    public function status($id)
    {
        $item = Disciplina::findOrFail($id);
        if ($item->ativo == 1){
            $item->fill(['ativo' => 0])->save();
            return redirect()->route('disciplina.index')->withStatus('Disciplina '.$item->nome.' desativada com sucesso');
        } else {
            $item->fill(['ativo' => 1])->save();
            return redirect()->route('disciplina.index')->withStatus('Disciplina '.$item->nome.' ativada com sucesso');
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
