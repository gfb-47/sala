<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:geral_view', ['only' => ['index']]);

    }
    public function index() 
    {
        $prof = Pessoa::select('pessoas.id','pessoas.nome as name')
        ->join('users', 'users.pessoa_id', '=', 'pessoas.id')
        ->where('users.tipo_usuario', 4)
        ->orderBy('pessoas.nome')->get();
        
        return view('professor.index', compact('prof'));
    }
}
