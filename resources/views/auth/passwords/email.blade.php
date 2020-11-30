@extends('layouts.app', ['class' => 'login-page', 'page' => 'Reset password', 'contentClass' => 'login-page'])
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
<style>
    .login-page .card-login {
        width: 800px;
    }
</style>
@section('content')
<div class="col-lg-4 col-md-6 ml-auto mr-auto">
    <form class="form" method="post" action="{{ route('password.email') }}">
        @csrf

        <div class="card card-login card-white" style="border-radius:20px; width: auto; height:250px;
                box-shadow: 4px 4px 4px 2px rgba(0, 0, 0, 0.507);">
            <div class="card-header" style="height: 50px; padding-top: 30px; padding-bottom: -30px">
                <h3 style="color: black; text-align: center; font-weight:bold; font-family:Bree Serif">Restaurar senha</h3>
            </div>
            <div class="card-body" style="margin-top: -80px; padding:40px;">
                @include('alerts.success')
                <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="height:33px; background-color: #EBEBEB">
                            <i style="color:#000;" class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" style="height:33px;background-color: #EBEBEB">
                    @include('alerts.feedback', ['field' => 'email'])
                </div>
            </div>
            <div class="card-footer" style="margin-top:-110px; padding: 40px;">
                <button type="submit" class="btn btn-primary btn-lg btn-block mb-3" style="border-radius: 5px;
                    height: 45px; padding: 0px; background-color: #0375D8">Enviar email</button>
            </div>
        </div>
    </form>
</div>
@endsection