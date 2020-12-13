<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\User;
use App\Pessoa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class AgendamentoController extends Controller
{
    public function gerarRelatorioGeral(Request $request){
        try {
            $data = Agendamento::info()
            //Ordenado no PDF por Data e dps Horário.
            ->orderBy('data', 'asc')
            ->orderBy('horainicio', 'asc')
            ->with('ambientes', 'users', 'motivos', 'disciplinas', 'professores')
            ->where('data', '>=', $request->datainicio)
            ->where('data', '<=', $request->datafim)
            ->where('situacao', 2)
            // Quantos agendamentos é possível mostrar em um pdf. Apenas altere o número do paginate.
            ->paginate(1000);
            return PDF::loadView('pdfs.geral_pdf', compact('data'))
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
            ->setPaper('a4', 'portrat')
            ->stream();
        }
        catch(Exception $e){
           
            return redirect()->route('relatorio.geral')->withError('Erro ao gerar PDF');

        }
    }

    public function gerarRelatorioProf(Request $request){

        try {

            $data = Agendamento::info()
            //Ordenado no PDF
            ->orderBy('data', 'asc')
            ->orderBy('horainicio', 'asc')
            ->with('ambientes', 'users', 'motivos', 'disciplinas', 'professores')
            ->where('professorresponsavel', $request->professorresponsavel)
            ->where('data', '>=', $request->datainicio)
            ->where('data', '<=', $request->datafim)
            ->where('situacao', 2)
            // Quantos agendamentos é possível mostrar em um pdf. Apenas altere o número do paginate.
            ->paginate(1000);
            
            $prof = Pessoa::select()
            ->where('id', $request->professorresponsavel)
            ->first();

            return PDF::loadView('pdfs.professor_pdf', compact('data', 'prof'))
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
            ->setPaper('a4', 'portrat')
            ->stream();
        }
        catch(Exception $e){
            
            return redirect()->route('relatorio.professor')->withError('Erro ao gerar PDF');
            
        }
    }
    
    public function gerarRelatorioOperacional(Request $request){
        try {
            $data = Agendamento::info()
            //Ordenado no PDF
            ->orderBy('data', 'asc')
            ->orderBy('horainicio', 'asc')
            ->with('ambientes', 'users', 'motivos', 'disciplinas', 'professores')
            ->where('professorresponsavel', auth()->id())
            ->where('data', '>=', $request->datainicio)
            ->where('data', '<=', $request->datafim)
            ->where('situacao', 2)
            // Quantos agendamentos é possível mostrar em um pdf. Apenas altere o número do paginate.
            ->paginate(1000);
            return PDF::loadView('pdfs.relatorio_pdf', compact('data'))
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
            ->setPaper('a4', 'portrat')
            ->stream();
    }
    catch(Exception $e){
        
        return redirect()->route('relatorio.operacional')->withError('Erro ao gerar PDF');

        }
    }

    public function gerarRelatorioAluno(Request $request) {
        try {
            $data = Agendamento::info()
            //Ordenado no PDF
            ->orderBy('data', 'asc')
            ->orderBy('horainicio', 'asc')
            ->with('ambientes', 'users', 'motivos', 'disciplinas', 'professores')
            ->where('user', auth()->id())
            ->where('data', '>=', $request->datainicio)
            ->where('data', '<=', $request->datafim)
            ->where('situacao', 2)
            // Quantos agendamentos é possível mostrar em um pdf. Apenas altere o número do paginate.
            ->paginate(1000);
            return PDF::loadView('pdfs.aluno_pdf', compact('data'))
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
            ->setPaper('a4', 'portrat')
            ->stream();
        }
        catch(Exception $e){
            return redirect()->route('relatorio.aluno')->withError('Erro ao gerar PDF');
        }
    }

    public function confirma($id) {
        $item = Agendamento::findOrFail($id);
        if ($item->situacao == 1){
            $item->fill(['situacao' => 2])->save();
            return redirect()->route('confirmaragendamento.index');
        } else {
            $item->fill(['situacao' => 3])->save();
            return redirect()->route('confirmaragendamento.index');
        }
    }

    public function userRejeita($id) {

        $item = Agendamento::findOrFail($id);
        $user = auth();
 
        if($user->user()->tipo_usuario == 2) {

            $date = Carbon::parse($item->data);
            $date->hour = $item->horainicio;
            $now = Carbon::now();
            if(($date->day - $now->day <= 2) && ($now->hour >= $date->hour)) {
                return redirect()->route('meusagendamentos.index')->withError('Não foi possível cancelar, pois só é possível com 48 horas de antecedência.');
            } else {
                $item->fill(['situacao' => 3])->save();
                return redirect()->route('meusagendamentos.index')->withStatus('Agendamento cancelado com sucesso.');
            }
        } else {
            $item->fill(['situacao' => 3])->save();
            return redirect()->route('meusagendamentos.index')->withStatus('Agendamento cancelado com sucesso.');
        }


    }

    public function rejeita($id) {

        $item = Agendamento::findOrFail($id);
        if ($item->situacao == 1){
            $item->fill(['situacao' => 3])->save();
            return redirect()->route('confirmaragendamento.index');
        } else {
            $item->fill(['situacao' => 2])->save();
            return redirect()->route('confirmaragendamento.index');
        }
    }
}
