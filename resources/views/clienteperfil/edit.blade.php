@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Perfil</h2>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label>Nome</label>
                                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ old('name', auth()->user()->name) }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" value="{{ old('email', auth()->user()->email) }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="Telefone" value="">
                                        @include('alerts.feedback', ['field' => 'matricula'])
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label>Matrícula</label>
                                        <input type="text" name="matricula" class="form-control{{ $errors->has('matricula') ? ' is-invalid' : '' }}" placeholder="Matrícula" value="">
                                        @include('alerts.feedback', ['field' => 'matricula'])
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label>CPF</label>
                                        <input type="text" name="cpf" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="CPF" value="">
                                        @include('alerts.feedback', ['field' => 'matricula'])
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-fill btn-secundary float-right">Salvar</button>
                                <button type="button" class="btn btn-fill btn-secundary float-right" data-toggle="modal" data-target="#alterarSenha">Alterar Senha</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="alterarSenha">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Alterar senha</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                        
                    @csrf
                    @method('put')
                    <div class="modal-body">

                        @include('alerts.success', ['key' => 'password_status'])

                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label>Senha atual</label>
                            <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="Senha atual" value="" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>Nova senha</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Nova senha" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label>Confirmar nova senha</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar nova senha" value="" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-fill btn-secudary">Alterar senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
