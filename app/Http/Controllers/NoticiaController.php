<?php

namespace App\Http\Controllers;

use App\Noticia;
use Storage;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:noticia_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:noticia_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:noticia_view', ['only' => ['index']]);
        $this->middleware('permission:noticia_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Noticia::info()->with('user')->orderBy('titulo')->paginate(10);
        return view('noticia.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticia.create');
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
                'titulo' => 'required|max:45',
                'conteudo' => 'nullable|max:4000',
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1920',
            ]
        );
        try {

            $inputs=$request->all();
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                
                $upload = $request->imagem->store('uploads/noticias', 'public');
                
                $inputs['imagem']= $upload;
            }
            
            $inputs['user_id']=auth()->id();
            Noticia::create($inputs);
            return redirect()->route('noticia.index')->withStatus('Registro Adicionado com Sucesso');
        }
        catch(Exception $e){
            return redirect()->route('noticia.index')->withError('Erro ao Adicionar Registro');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Noticia::findOrFail($id);
        return view('noticia.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'titulo' => 'required|max:45',
                'conteudo' => 'nullable|max:4000',
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1920',
            ]
        );

        try {
            $inputs = $request->except('imagem');
            $item = Noticia::findOrFail($id);
            $item->fill($inputs);

            
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $upload = $request->imagem->store('uploads/noticias', 'public');
                
                if ($item->imagem) {
                    Storage::disk('public')->delete($item->imagem);
                }
                
                $item->imagem = $upload;
                
                $item->save();
            }
            return redirect()->route('noticia.index')->withStatus('Registro Atualizado com Sucesso');
        }
        catch(Exception $e){
            return redirect()->route('noticia.index')->withError('Erro ao Atualizar Registro');
            
        }
        }
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $item = Noticia::findOrFail($id);
            if ($item->imagem) {
                Storage::disk('public')->delete($item->imagem);
            }
            $item->delete();
            return redirect()->route('noticia.index')->withStatus('Registro Excluído com Sucesso');
        }
        catch(Exception $e){
            return redirect()->route('noticia.index')->withError('Erro ao Excluir');
            
        }
    }
}