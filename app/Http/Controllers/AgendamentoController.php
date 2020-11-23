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
        ->paginate(10);
        return PDF::loadView('pdfs.geral_pdf', compact('data'))
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
        ->setPaper('a4', 'portrat')
        ->stream();
        }
        catch(Exception $e){
           
            return redirect()->route('relatorio.operacional')->withError('Erro ao gerar PDF');

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
        ->paginate(10);
        
            return PDF::loadView('pdfs.professor_pdf', compact('data'))
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
        ->setPaper('a4', 'portrat')
        ->stream();
        }
        catch(Exception $e){
            
            return redirect()->route('relatorio.operacional')->withError('Erro ao gerar PDF');

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
        ->paginate(10);
        }
        catch(Exception $e){
            
            return redirect()->route('relatorio.operacional')->withError('Erro ao gerar PDF');

        }
    }
}
