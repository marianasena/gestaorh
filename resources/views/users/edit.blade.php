@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Editar Usuário</h2>
        </div>
    </div>

    @if (count($errors) > 0)
        @include('layouts.error')
    @endif

    <form method="post" action="{{url('usuarios')}}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{$user->name}}" class="form-control" id="nome">
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="nome">E-mail</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email">
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                    <label for="nome">Usuário</label>
                    <input type="text" name="usuario" value="{{$user->username}}" class="form-control" id="usuario">
                    <span class="help-block">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{url('usuarios')}}">Voltar</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
                </div>
            </div>
        </div>

    </form>

@endsection