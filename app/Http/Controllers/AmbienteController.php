<?php

namespace App\Http\Controllers;

use App\Ambiente;
use App\TipoAmbiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ambiente::info()->orderBy('nome')
        ->with('tipoAmbiente')
        ->paginate(10);
        return view('ambiente.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoambiente = TipoAmbiente::select('id','nome as name')->orderBy('nome')->get();
        return view('ambiente.create', compact('tipoambiente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ambiente::create($request->all());
        return redirect()->route('ambiente.index')->withStatus('Registro Adicionado com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function show(Ambiente $ambiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoambiente = TipoAmbiente::select('id','nome as name')->orderBy('nome')->get();
        $item = Ambiente::findOrFail($id);
        return view('ambiente.edit', compact('item', 'tipoambiente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Ambiente::findOrFail($id);
        $item->fill($request->all());
        $item->save();
        return redirect()->route('ambiente.index')->withStatus('Registro Adicionado com Sucesso');
    }

    public function status(Request $request, $id)
    {
        $item = Ambiente::findOrFail($id);
        if ($item->ativo == 1){
            $item->fill(['ativo' => 0])->save();
            return redirect()->route('ambiente.index')->withStatus('Ambiente '.$item->nome.' desativado com sucesso');
        } else {
            $item->fill(['ativo' => 1])->save();
            return redirect()->route('ambiente.index')->withStatus('Ambiente '.$item->nome.' ativado com sucesso');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        //
    }
}
