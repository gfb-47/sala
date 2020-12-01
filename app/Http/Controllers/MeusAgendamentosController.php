<?php

namespace App\Http\Controllers;

use App\Agendamento;
use Illuminate\Http\Request;
use App\ModelFilters\AgendamentosFilter;

class MeusAgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $situacao = $this->allStatus();
        $data = Agendamento::info()->orderBy('ambiente')->with('ambientes', 'motivos')
        ->where('user', auth()->id())
        ->orderBy('situacao', 'DESC')
        ->filter($request->all())
        ->paginate(10)
        ->appends($request->all());

        return view('meusagendamentos.index', compact('data', 'situacao'));
    }

    public function allStatus() {
        return [
            1=>'Pendente', 'Confirmado', 'Cancelado'
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Agendamento::info()
        ->with('ambientes', 'motivos', 'disciplinas', 'professores')
        ->findOrFail($id);
        return view('meusagendamentos.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        //
    }
}
