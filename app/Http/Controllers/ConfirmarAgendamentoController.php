<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Ambiente;
use App\Curso;
use App\Disciplina;
use App\Pessoa;
use App\MotivoUtilizacao;

use Illuminate\Http\Request;

class ConfirmarAgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agendamento::info()->orderBy('ambiente')->with('ambientes', 'motivos')
        ->where('agendamentos.situacao', 1)
        ->paginate(10);
        $ambiente = Ambiente::select('id','nome as name')
        ->where('ambientes.ativo', 1)
        ->orderBy('nome')->get();
        $curso = Curso::select('id','nome as name')
        ->where('cursos.ativo', 1)
        ->orderBy('nome')->get();
        $disciplina = Disciplina::select('id','nome as name', 'curso_id as curso')
        ->with('curso')
        ->where('disciplinas.ativo', 1)
        ->orderBy('nome')->get();
        $prof = Pessoa::select('pessoas.id','pessoas.nome as name')
        ->join('users', 'users.pessoa_id', '=', 'pessoas.id')
        ->where('users.tipo_usuario', 4)
        ->orderBy('pessoas.nome')->get();
        $motivo = MotivoUtilizacao::select('id','motivo as name')->orderBy('motivo')->get();

        return view('confirmaragendamento.index', compact('ambiente', 'data',
        'disciplina', 'prof', 'curso', 'motivo'));
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
        return view('confirmaragendamento.show', compact('item'));
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
