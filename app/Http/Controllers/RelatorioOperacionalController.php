<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioOperacionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:relatorioprofessor_user', ['only' => ['index']]);
    }
    
    public function index() 
    {
        return view('relatorio.index');
    }
}
