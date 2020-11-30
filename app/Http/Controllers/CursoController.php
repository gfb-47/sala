<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:curso_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:curso_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:curso_view', ['only' => ['index']]);
        $this->middleware('permission:curso_inactive', ['only' => ['status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Curso::info()->orderBy('nome')->paginate(10);
        return view('curso.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            Curso::create($request->all());
            return redirect()->route('curso.index')->withStatus('Registro Adicionado com Sucesso');
        }
        catch(Exceptio $e){

            return redirect()->route('curso.index')->withStatus('Erro ao Adicionar');

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   

         $item = Curso::findOrFail($id);
         return view('curso.edit', compact('item'));
      
  
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            $item = Curso::findOrFail($id);
            $item->fill($request->all());
            $item->save();
            return redirect()->route('curso.index')->withStatus('Registro Adicionado com Sucesso');
        }
        catch(Exception $e){
            
            return view('curso.edit', compact('item'))->withError('Erro ao Salvar Alterações');

        }
    }

    public function status($id)
    {

        try {

            $item = Curso::findOrFail($id);
            if ($item->ativo == 1){
                $item->fill(['ativo' => 0])->save();
                return redirect()->route('curso.index')->withStatus('Curso '.$item->nome.' desativada com sucesso');
            } else {
                $item->fill(['ativo' => 1])->save();
                return redirect()->route('curso.index')->withStatus('Curso '.$item->nome.' ativada com sucesso');
            }
        }
        catch(Exception $e){
            
            return redirect()->route('curso.index')->withError('Erro ao Consultar Status');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
