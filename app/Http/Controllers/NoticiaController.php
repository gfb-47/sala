<?php

namespace App\Http\Controllers;

use App\Noticia;
use Storage;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
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
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]
        );

        $inputs=$request->all();
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $upload = $request->imagem->store('uploads/noticias', 'public');

            $inputs['imagem']= $upload;
        }

        $inputs['user_id']=auth()->id();
        Noticia::create($inputs);
        return redirect()->route('noticia.index')->withStatus('Registro Adicionado com Sucesso');
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
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]
        );
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
        return redirect()->route('noticia.index')->withStatus('Registro Adicionado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Noticia::delete($id);
        return redirect()->route('noticia.index');
    }
}
