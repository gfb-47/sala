<?php

namespace App\Http\Controllers;

use App\TipoAmbiente;
use Illuminate\Http\Request;

class TipoAmbienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:tipoambiente_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tipoambiente_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tipoambiente_view', ['only' => ['index']]);
        $this->middleware('permission:tipoambiente_inactive', ['only' => ['status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoAmbiente::info()->orderBy('nome')->paginate(10);
        return view('tipoambiente.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoambiente.create');
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

            TipoAmbiente::create($request->all());
            return redirect()->route('tipoambiente.index')->withStatus('Registro Adicionado com Sucesso');
        }
        catch(Exception $e){
            
            return redirect()->route('tipoambiente.index')->withError('Erro ao Adicionar Registro');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoAmbiente  $tipoAmbiente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAmbiente  $tipoAmbiente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TipoAmbiente::findOrFail($id);
        return view('tipoambiente.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoAmbiente  $tipoAmbiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
        ]);
        try {

            $item = TipoAmbiente::findOrFail($id);
            $item->fill($request->all());
            $item->save();
            return redirect()->route('tipoambiente.index')->withStatus('Registro Atualizado com Sucesso');
        }
        catch(Exception $e){
            return redirect()->route('tipoambiente.index')->withError('Erro ao Atualizar');
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoAmbiente  $tipoAmbiente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Request $request, $id)
    {
        try{

            $item = TipoAmbiente::findOrFail($id);
            if ($item->ativo == 1){
                $item->fill(['ativo' => 0])->save();
                return redirect()->route('tipoambiente.index')->withStatus('TipoAmbiente '.$item->nome.' desativado com sucesso');
            } else {
                $item->fill(['ativo' => 1])->save();
                return redirect()->route('tipoambiente.index')->withStatus('TipoAmbiente '.$item->nome.' ativado com sucesso');
            }
        }
        catch(Exception $e){
            return redirect()->route('tipoambiente.index')->withError('Erro ao Salvar Alterações');
        }
    }
}
