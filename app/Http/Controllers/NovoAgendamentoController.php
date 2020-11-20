<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Ambiente;
use App\Curso;
use App\Disciplina;
use App\Pessoa;
use App\MotivoUtilizacao;

use Illuminate\Http\Request;

class NovoAgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Agendamento::info()->orderBy('ambiente')->paginate(10);
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
        $termo_de_uso = Ambiente::select('termodeuso')->where('id',$id)->first();
        return view('novoagendamento.index', compact('ambiente', 'data',
     'disciplina', 'prof', 'curso', 'motivo','id','termo_de_uso'));
    }


    public function termosdeuso($id) {
        $data=Ambiente::select('termodeuso')->where('id',$id)->first();
        return view('termosdeuso.index', compact('data'));
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
        $inputs=$request->all();
        $inputs['user']=auth()->id();
        $inputs['situacao']= 1;
        Agendamento::create($inputs);
        return redirect()->route('meusagendamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento)
    {
        //
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
