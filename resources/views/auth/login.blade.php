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

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

<div class="row">

    <!-- Mixins-->
    <!-- Pen Title-->
    <div class="pen-title">
        <h1></h1>
    </div>
    <div class="container">
        <div class="card">
            <h1 class="title">Login</h1>
            <form method="POST" action="{{url('login')}}">
                {!! csrf_field() !!}
                <div class="input-container {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" id="email" required="required" />
                    <label for="email">Email</label>
                    <div class="bar"></div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-container{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" id="password" required="required"/>
                    <label for="Password">Senha</label>
                    <div class="bar"></div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="button-container">

                    <button type="submit" class="btn btn-default"><span>Acessar</span></button>
                </div>
                <div class="footer"><a href="{{ route('password.request') }}">Esqueceu sua senha?</a></div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>