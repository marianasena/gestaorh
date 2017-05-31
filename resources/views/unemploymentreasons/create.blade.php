@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Novo Motivo de Desligamento</h2>
        </div>
    </div>

    <form method="post" action="{{route('unemployment_reason_store')}}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{old('nome')}}" id="nome">
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                    <label for="nome">Descrição</label>
                    <textarea class="form-control" name="descricao" class="form-control" id="descricao">{{old('descricao')}}</textarea>
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{route('unemployment_reasons')}}">Voltar</a>
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