<?php

namespace App\Http\Controllers;

use App\Agendamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class AgendamentoController extends Controller
{
    public function gerarRelatorioGeral(){
        $data = Agendamento::info()
        //Ordenado no PDF por Data e dps Horário.
        ->orderBy('data', 'asc')
        ->orderBy('horainicio', 'asc')
        ->with('ambientes', 'users', 'motivos', 'cursos', 'disciplinas', 'professores')
        ->paginate(10);

        return PDF::loadView('pdfs.geral_pdf', compact('data'))
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
        ->setPaper('a4', 'portrat')
        ->stream();
    }

    public function gerarRelatorioProf(){
        $data = Agendamento::info()
        //Ordenado no PDF
        ->orderBy('data', 'asc')
        ->orderBy('horainicio', 'asc')
        ->with('ambientes', 'users', 'motivos', 'cursos', 'disciplinas', 'professores')
        ->where('professorresponsavel', auth()->id())
        ->paginate(10);

        return PDF::loadView('pdfs.professor_pdf', compact('data'))
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir' => public_path(),'chroot'  => public_path(),])
        ->setPaper('a4', 'portrat')
        ->stream();
    }
}
