<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioAlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:relatorioaluno_user', ['only' => ['index']]);
    }

    public function index() 
    {
        return view('aluno.index');
    }
}
