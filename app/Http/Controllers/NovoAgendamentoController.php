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
    public function index()
    {
        // $agendamento=new Agendamento();
        // $agendamento->ambiente='1';
        // $agendamento->user='1';
        // $agendamento->curso='1';
        // $agendamento->disciplina='1';
        // $agendamento->professorresponsavel='1';
        // $agendamento->motivoutilizacao='1';
        // $agendamento->horainicio='20:20:20';
        // $agendamento->horafim='21:00:00';
        // $agendamento->data='2000-07-07';
        // $agendamento->situacao='1';
        // $agendamento->observacao='aaaaaaa';
        // $agendamento->save();
        // $agendamento= Agendamento::all();
        // return $agendamento;
        $data = Agendamento::info()->orderBy('ambiente')->paginate(10);
        $ambiente = Ambiente::select('id','nome as name')->orderBy('nome')->get();
        $curso = Curso::select('id','nome as name')->orderBy('nome')->get();
        $disciplina = Disciplina::select('id','nome as name')->orderBy('nome')->get();
        $prof = Pessoa::select('id','nome as name')->orderBy('nome')->get();
        $motivo = MotivoUtilizacao::select('id','motivo as name')->orderBy('motivo')->get();
        return view('novoagendamento.index', compact('ambiente', 'data', 'curso',
     'disciplina', 'prof', 'motivo'));
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
        return redirect()->route('novoagendamento.index');
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
