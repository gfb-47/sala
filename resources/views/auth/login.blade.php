@extends('layouts.app', ['class' => 'login-page', 'page' =>'Login Page', 'contentClass' => 'login-page'])
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
@section('content')
<div class="col-lg-4 col-md-6 ml-auto mr-auto">
    <form class="form" method="post" action="{{ route('login') }}">
        @csrf
        <div class="card card-login card-white" style="border-radius:20px; width: auto; height:350px;
                box-shadow: 4px 4px 4px 2px rgba(0, 0, 0, 0.507);">
            <div class="card-header" style="height: 50px; padding-top: 30px; padding-bottom: -30px">
                <h3 style="color: black; text-align: center; font-weight:bold; font-family:Bree Serif">Login</h3>
            </div>
            <div class="card-body" style="margin-top: -80px; padding:40px;">
                <div class="input-group{{ $errors->has('cpf') ? ' has-danger' : '' }}" style="margin-bottom:22px;">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="height:33px; background-color: #EBEBEB">
                            <i style="color:#000;" class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="text" name="cpf" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} cpf" style="height:33px;background-color: #EBEBEB;" placeholder="CPF">
                    @include('alerts.feedback', ['field' => 'cpf'])
                </div>
                <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="height:33px;background-color: #EBEBEB">
                            <i styte="color:#fff;" class="fa fa-lock" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="password" maxlength="11" placeholder="Senha" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="height:33px;background-color: #EBEBEB">
                    @include('alerts.feedback', ['field' => 'password'])
                </div>
            </div>
            <div class="card-footer" style="margin-top:-110px; padding: 60px;">
                <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3" style="border-radius: 5px;
                    height: 45px; padding: 0px; background-color: #0375D8">Entrar</button>

                <a class="btn btn-primary btn-lg btn-block mb-3" style="border-radius: 5px;
                    height: 20px; padding: 0px; background-color: #0375D8" href="{{ route('password.request') }}">Esqueci minha senha</a>
            </div>
        </div>
    </form>
</div>
@endsection