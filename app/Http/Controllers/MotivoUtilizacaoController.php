<?php

namespace App\Http\Controllers;

use App\MotivoUtilizacao;
use Illuminate\Http\Request;

class MotivoUtilizacaoController extends Controller
{

    public function index()
    {
        $data = MotivoUtilizacao::info()->orderBy('motivo')->paginate(10);
        return view('motivoutilizacao.index', compact('data'));
    }

    public function create()
    {
        return view('motivoutilizacao.create');
    }

    public function store(Request $request)
    {
        MotivoUtilizacao::create($request->all());
        return redirect()->route('motivoutilizacao.index')->withStatus('Registro Adicionado com Sucesso');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = MotivoUtilizacao::findOrFail($id);
        return view('motivoutilizacao.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = MotivoUtilizacao::findOrFail($id);
        $item->fill($request->all());
        $item->save();
        return redirect()->route('motivoutilizacao.index')->withStatus('Registro Adicionado com Sucesso');

    }

    public function destroy(MotivoUtilizacao $motivoUtilizacao)
    {
        //
    }
}
