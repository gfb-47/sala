<?php

namespace App\Http\Controllers;

use App\TipoAmbiente;
use Illuminate\Http\Request;

class TipoAmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoAmbiente::select('*')->get();
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
        TipoAmbiente::create($request->all());
        return redirect()->route('tipoambiente.index');
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
        $item = TipoAmbiente::findOrFail($id);
        $item->fill($request->all());
        $item->save();
        return redirect()->route('tipoambiente.index');

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
}
