<?php

namespace App\Http\Controllers;

use App\Noticia;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Noticia::info()
        ->with('user')
        ->latest()
        ->paginate(10)
        ->take(10);
        return view('users/indexUser', compact('data'));
    }
}
