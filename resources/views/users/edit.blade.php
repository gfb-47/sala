@extends('layouts.app', ['page' => 'Usuario', 'pageSlug' => 'Usuario'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Usuário</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!!Form::open()
                    ->put()
                    ->fill($item)
                    ->route('user.update', [$item->id])
                    ->multipart()!!}
                    <div class="pl-lg-4">
                        @include('users._form')
                    </div>
                    {!!Form::close()!!}
                </div>
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
                <form method="post" action="{{ route('user.password', [$item->id]) }}">
                    @csrf
                    @method('put')
                    @include('alerts.success', ['key' => 'password_status'])
                    <div class="modal-body">
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
</div>
@endsection