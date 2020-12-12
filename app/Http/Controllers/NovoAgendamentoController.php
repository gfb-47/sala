<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Agendamento;
use App\Ambiente;
use App\Curso;
use App\Disciplina;
use App\Pessoa;
use App\User;
use App\MotivoUtilizacao;
use DateTime;

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
        ->where('users.ativo', 1)
        ->where('users.tipo_usuario', 4)
        ->orderBy('pessoas.nome')->get();
        $motivo = MotivoUtilizacao::select('id','motivo as name')
        ->where('motivos_utilizacao.ativo', 1)
        ->orderBy('motivo')
        ->get();
        $termo_de_uso = Ambiente::select('termodeuso')->where('id',$id)->first();
        $ambienteSelecionado = Ambiente::findOrFail($id);
        
        return view('novoagendamento.index', compact('ambiente', 'data',
     'disciplina', 'prof', 'curso', 'motivo','id','termo_de_uso', 'ambienteSelecionado'));
    }


    public function termosdeuso($id) {
        try{

            $data=Ambiente::select('termodeuso')->where('id',$id)->first();
            return view('termosdeuso.index', compact('data'));
        }
        catch(Exception $e){
            
            return redirect()->route('novoagendamento.index')->withError('Erro ao Salvar Alterações');

        }
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
        
        try{

            $inputs = $request->all();
            $inputs['user']=auth()->id();
            $inputs['situacao']= 1;
            $ym = Carbon::parse($request->data);
            $data = Agendamento::select('data', 'horainicio', 'horafim', 'situacao')
            ->where('user', $inputs['user'])
            ->where('situacao', '!=', 3)
            ->whereYear('data', $ym->year)
            ->whereMonth('data', $ym->month)
            ->get();

            $user = User::findOrFail($inputs['user']=auth()->id());
            $dataaux = Agendamento::select('data', 'horainicio', 'horafim', 'situacao')->get();
                
            if ($user->tipo_usuario == 2) {
                if(sizeOf($data) == 3){
                    return redirect()->route('meusagendamentos.index')->withError('Não é possível reservar mais de 3 vezes por mês');
                }
                if((Carbon::parse($request->horainicio)->floatDiffInMinutes($request->horafim) / 60) > 3){
                    return redirect()->route('meusagendamentos.index')->withError('Não é possível reservar mais de 3 horas');
                }
            }
            Agendamento::create($inputs);
            return redirect()->route('meusagendamentos.index')->withStatus('Salvo com Sucesso');
        }
        catch(Exception $e){
            return redirect()->route('meusagendamentos.index')->withError('Erro ao Salvar Alterações');
        }
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
