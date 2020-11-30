@extends('layouts.appNoSideBar', ['page' => 'User Profile', 'pageSlug' => 'perfil'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Perfil</h2>
                </div>
                <form method="post" action="{{ route('perfil.update', auth()->id()) }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')
                            @include('alerts.error')

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
                                    <div class="form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                        <label>Telefone</label>
                                        <input type="text" id="telephone" name="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="Telefone" value="{{ old('telefone', Auth::user()->pessoa->telefone) }}">
                                        @include('alerts.feedback', ['field' => 'telefone'])
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Matrícula</label>
                                        <label class="form-control">{{ auth()->user()->pessoa->matricula}}</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                        <label>CPF</label>
                                        <input type="text" id="cpf" name="cpf" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="CPF" value="{{ old('cpf', auth()->user()->cpf) }}">
                                        @include('alerts.feedback', ['field' => 'cpf'])
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-fill btn-lg btn-primary float-right">Salvar</button>
                                <button type="button" class="btn btn-fill btn-lg btn-secondary float-right" data-toggle="modal" data-target="#alterarSenha">Alterar Senha...</button>
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
                        <button type="submit" class="btn btn-fill btn-primary">Alterar senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#telephone').mask('(00) 00000-0000');
        });

        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
    </script>
@endpush
