<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{

    public function __construct()
    {    
        $this->middleware('permission:tipousuario_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tipousuario_view', ['only' => ['index']]);        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoUsuario::info()->orderBy('nome')->paginate(10);
        return view('tipousuario.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TipoUsuario::findOrFail($id);
        return view('tipousuario.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome' => 'required|max:50'
        ]);
        try{
            $item = TipoUsuario::findOrFail($id);
            $item->fill($request->all());
            $item->save();
            return redirect()->route('tipousuario.index')->withStatus('Registro Atualizado com Sucesso');
        }
        catch(Exception $e){
            return redirect()->route('tipousuario.index')->withError('Erro ao Atualizar Registro');
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoUsuario $tipoUsuario)
    {
        //
    }
}
