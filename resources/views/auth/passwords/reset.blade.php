@extends('layouts.app', ['class' => 'login-page', 'page' => _('Reset password'), 'contentClass' => 'login-page'])
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
<style>
    .login-page .card-login {
        width: 800px;
    }
</style>
@section('content')
    <div class="col-lg-5 col-md-7 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('password.update') }}">
            @csrf

            <div class="card card-login card-white"  style="border-radius:20px; width: auto; height:350px;
                box-shadow: 4px 4px 4px 2px rgba(0, 0, 0, 0.507);">
                <div class="card-header"  style="height: 50px; padding-top: 30px; padding-bottom: -30px">
                    <h3 style="color: black; text-align: center; font-weight:bold; font-family:Bree Serif">Resetar senha</h3>
                </div>
                <div class="card-body" style="margin-top: -80px; padding:40px;">
                    @include('alerts.success')

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend" style="height:33px; background-color: #EBEBEB">
                            <div class="input-group-text">
                                <i style="color:#000;" class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}"  style="height:33px;background-color: #EBEBEB">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend" style="height:33px; background-color: #EBEBEB">
                                <div class="input-group-text">
                                    <i style="color:#000;" class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Password') }}"  style="height:33px;background-color: #EBEBEB">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="height:33px; background-color: #EBEBEB">
                                    <i style="color:#000;" class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirm Password') }}"  style="height:33px;background-color: #EBEBEB">
                        </div>
                </div>
                <div class="card-footer" style="margin-top:-110px; padding: 40px;">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Reset Password') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
