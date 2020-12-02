<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\TipoUsuario;
use App\Pessoa;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:usuario_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:usuario_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:usuario_view', ['only' => ['index']]);
        $this->middleware('permission:usuario_inactive', ['only' => ['status']]);
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = User::info()->orderBy('name')
        ->with('pessoa', 'tipoUsuario')
        ->paginate(10);
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoUsuario = TipoUsuario::select('id', 'nome as name')->get();
        return view('users.create', compact('tipoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            try {
                $input = $request->except('_token');
                //dd($request);
                $item = Pessoa::create([
                    'nome' => $request->name,
                    'matricula' => $request->matricula,
                    'telefone' => $request->telefone,
                ]);
                $input['pessoa_id']=$item->id;
                $input['name']=$item->nome;
                $input['password'] = encryptCpf($input['cpf']);
                $user = User::create($input);
                
                if($request->tipo_usuario == 4){
                    $user->assignRole('professor');
                }

                if($request->tipo_usuario == 1 || $request->tipo_usuario == 3){
                    $user->assignRole('administrador_plataforma');
                }
            } catch (Exception $e) {
                return redirect()->route('user.create')->withError('Erro adicionado com sucesso');
            }
        });
        return redirect()->route('user.index')->withStatus('Registro Adicionado com Sucesso');
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
    public function edit($id)
    {
        $item = User::select('users.*', 'pessoas.matricula', 'pessoas.telefone')
        ->join('pessoas', 'users.pessoa_id', '=', 'pessoas.id')
        ->where('users.id', $id)
        ->first();
        $tipoUsuario = TipoUsuario::select('id', 'nome as name')->get();
        return view('users.edit', compact('item','tipoUsuario'));
    }

    public function password(request $request, $id)
    {
        $item = User::select('users.*', 'pessoas.matricula', 'pessoas.telefone')
        ->join('pessoas', 'users.pessoa_id', '=', 'pessoas.id')
        ->where('users.id', $id)
        ->first();
        $tipoUsuario = TipoUsuario::select('id', 'nome as name')->get();
        $item->update(['password' => Hash::make($request->get('password'))]);
        return redirect()->route('user.index')->withStatus('Senha alterada com sucesso.');
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
        $this->validate($request, [
            'cpf' => 'required|string|size:14',
            'name' => 'nullable|string',
            'telefone' => 'required|string|size:15',
        ]);

        DB::transaction(function() use ($request, $id) {
            try {
                $inputs = $request->except('_token');
                $inputs['nome'] = $inputs['name'];
                $item = User::findOrFail($id);
                $item->fill($inputs)->save();
                $pessoa = Pessoa::findOrFail($item->pessoa_id);
                $pessoa->fill($inputs)->save();
            } catch (Exception $e) {
             return redirect()->route('user.index')->withError('Erro adicionado com sucesso');
            }
    });
    return redirect()->route('user.index')->withStatus('Registro atualizado com sucesso');
    }

    public function status($id)
    {
        $item = User::findOrFail($id);
        if ($item->ativo == 1){
            $item->fill(['ativo' => 0])->save();
            return redirect()->route('user.index')->withStatus('Usuário '.$item->nome.' desativado com sucesso');
        } else {
            $item->fill(['ativo' => 1])->save();
            return redirect()->route('user.index')->withStatus('Usuário '.$item->nome.' ativado com sucesso');
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
