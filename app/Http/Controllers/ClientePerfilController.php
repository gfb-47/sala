<?php

namespace App\Http\Controllers;

use App\User;
use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientePerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('clienteperfil.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('clienteperfil.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'cpf' => 'required|unique:users,cpf,'.auth()->id(),
            'name' => 'nullable|string',
            'telefone' => 'required|string|min:11',
            'matricula' => 'required|string'
        ]);

        try {

            $item = User::findOrFail($id);
            $item->fill($request->all());
            $item->save();
            $pessoa = Pessoa::findOrFail($item->pessoa_id);
            $pessoa->fill($request->all());
            $pessoa->save();
            return redirect()->route('perfil.index')->withStatus('Salvo com Sucesso');
        }
        catch(Exception $e){
           
            return redirect()->route('perfil.index')->withError('Erro ao Salvar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
