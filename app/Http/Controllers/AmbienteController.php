<?php

namespace App\Http\Controllers;

use App\Ambiente;
use App\TipoAmbiente;
use Storage;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ambiente_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ambiente_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ambiente_view', ['only' => ['index']]);
        $this->middleware('permission:ambiente_inactive', ['only' => ['status']]);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ambiente::info()->orderBy('nome')
        ->with('tipoAmbiente')
        ->paginate(10);
            return view('ambiente.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
            $tipoambiente = TipoAmbiente::select('id','nome as name')->orderBy('nome')->get();
            return view('ambiente.create', compact('tipoambiente'));
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required|max:45', 
                'tipoambiente' => 'required', 
                'termodeuso' => 'nullable|mimes:pdf|max:2048'
            ]
        );
        try {
            $item = Ambiente::create($request->all());

            if ($request->hasFile('termodeuso') && $request->file('termodeuso')->isValid()) {
                $uploads = $request->termodeuso->store('uploads/termosdeuso', 'public');
    
                $item->termodeuso = $uploads;
    
                $item->save();
            }
            return redirect()->route('ambiente.index')->withStatus('Registro Adicionado com Sucesso');
        }
       catch(Exception $e){
           return redirect()->route('ambiente.index')->withError('Erro ao Adicionar');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function show(Ambiente $ambiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tipoambiente = TipoAmbiente::select('id', 'nome as name')->orderBy('nome')->get();
            $item = Ambiente::findOrFail($id);

            return view('ambiente.edit', compact('item', 'tipoambiente'));

        }
        catch(Exception $e){
            return redirect()->route('ambiente.index')->withError('Erro ao Selecionar Ambiente');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required|max:45', 
                'tipoambiente' => 'required', 
                'termodeuso' => 'nullable|mimes:pdf|max:2048'
            ]
        );
        try {
            $item = Ambiente::findOrFail($id);
            $item->fill($request->except('termodeuso'));
            if ($request->hasFile('termodeuso') && $request->file('termodeuso')->isValid()) {
                $uploads = $request->termodeuso->store('uploads/termosdeuso', 'public');

                if ($item->termodeuso) {
                    Storage::disk('public')->delete($item->getOriginal('termodeuso'));
                }

                $item->termodeuso = $uploads;
            }
            $item->save();
        
            return redirect()->route('ambiente.index')->withStatus('Registro atualizado com Sucesso');
        }
        catch(Exception $e){
            
            return redirect()->route('ambiente.index')->withError('Erro ao Salvar Alterações');
        }
    }

    public function status(Request $request, $id)
    {
        try{

            $item = Ambiente::findOrFail($id);
            if ($item->ativo == 1){
                $item->fill(['ativo' => 0])->save();
                return redirect()->route('ambiente.index')->withStatus('Ambiente '.$item->nome.' desativado com sucesso');
            } else {
                $item->fill(['ativo' => 1])->save();
                return redirect()->route('ambiente.index')->withStatus('Ambiente '.$item->nome.' ativado com sucesso');
            }
        }
        catch(Exception $e){
            return redirect()->route('ambiente.index')->withError('Erro ao Salvar Alterações');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        //
    }
}
