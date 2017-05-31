@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Editar Motivo de Desligamento</h2>
        </div>
    </div>

    @if (count($errors) > 0)
        @include('layouts.error')
    @endif

    <form method="post" action="{{ route('unemployment_reason_update', ['unemploymentReason' => $unemploymentReason->id]) }}">
        {!! csrf_field() !!}
        {{method_field('PATCH')}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{ (old('nome') ? old('nome') : $unemploymentReason->name) }}" class="form-control" id="nome">
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
                    <textarea class="form-control" name="descricao" class="form-control" id="descricao">{{ (old('descricao') ? old('descricao') : $unemploymentReason->description) }}</textarea>
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
                    <button type="submit" class="btn btn-primary form-control">Salvar</button>
                </div>
            </div>
        </div>

    </form>

@endsection