<?php

namespace App\Http\Controllers;

use App\MotivoUtilizacao;
use Illuminate\Http\Request;

class MotivoUtilizacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:motivo_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:motivo_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:motivo_view', ['only' => ['index']]);
        $this->middleware('permission:motivo_inactive', ['only' => ['status']]);
    }
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

    public function status($id)
    {
        $item = MotivoUtilizacao::findOrFail($id);
        if ($item->ativo == 1){
            $item->fill(['ativo' => 0])->save();
            return redirect()->route('motivoutilizacao.index')->withStatus('Motivo '.$item->nome.' desativado com sucesso');
        } else {
            $item->fill(['ativo' => 1])->save();
            return redirect()->route('motivoutilizacao.index')->withStatus('Motivo '.$item->nome.' ativado com sucesso');
        }
    }

    public function destroy(MotivoUtilizacao $motivoUtilizacao)
    {
        //
    }
}
