<?php

namespace App\Http\Controllers;

use App\Agendamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

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
        ->where('situacao', 4)
        ->paginate(10);
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
            ->where('situacao', 4)
            ->paginate(10);
            
            return PDF::loadView('pdfs.professor_pdf', compact('data'))
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
            ->where('situacao', 4)
        ->paginate(10);

        return PDF::loadView('pdfs.relatorio_pdf', compact('data'))
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
        ->setPaper('a4', 'portrat')
        ->stream();
    }
    catch(Exception $e){
        
        return redirect()->route('relatorio.operacional')->withError('Erro ao gerar PDF');

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
