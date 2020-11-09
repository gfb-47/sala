<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class AgendamentoController extends Controller
{
    public function teste(){
        return PDF::loadView('pdfs.professor_pdf')
        ->setPaper('a4', 'portrat')
        ->stream();
    }
}
