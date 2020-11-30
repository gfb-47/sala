<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioOperacionalController extends Controller
{
    public function index() 
    {
        return view('relatorio.index');
    }
}
