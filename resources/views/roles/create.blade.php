@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Novo Cargo</h2>
        </div>
    </div>

    <form method="post" action="{{url('cargos')}}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" id="nome">
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{url('cargos')}}">Voltar</a>
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