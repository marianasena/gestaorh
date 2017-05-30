<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/login2.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="login-screen">

        <div class="row">
            <div class="login-icon col-md-3 text-center">
                <img src="{{ asset('icons/team-c.svg') }}" width="100" height="100" alt="Bem-vindo ao Gestão de RH"><br />
                <small><strong>Bem-vindo ao</strong></small><br />
                <h3 class="brand">Gestão de RH</h3>
            </div>
            <div class=" col-md-9">
                <form method="post" action="{{url('login')}}">
                    {!! csrf_field() !!}
                    <div class="login-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}" id="username" placeholder="Usuário" />
                                    <i class="glyphicon glyphicon-user form-control-feedback"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password" placeholder="Senha" />
                                    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Mantenha-me conectado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">Acessar</button>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <a href="{{ route('password.request') }}" class="btn-link">Esqueceu sua senha?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>