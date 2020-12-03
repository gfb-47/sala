<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeralController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:professor_view', ['only' => ['index']]);

    }
    public function index() 
    {
        return view('geral.index');
    }
}
