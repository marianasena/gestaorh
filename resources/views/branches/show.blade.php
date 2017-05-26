@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Editar Filial</h2>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="row">
        <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

        </div>
    </div>
    @endif

    <form method="POST" action="/filiais/{{$branch->id}}/editar/">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{$branch->name}}" class="form-control" id="nome">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('sigla') ? ' has-error' : '' }}">
                    <label for="nome">Sigla</label>
                    <input type="text" name="sigla" value="{{$branch->initials}}" class="form-control" id="sigla">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Salvar</button>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{url('filiais')}}">Voltar</a>
                </div>
            </div>
        </div>

    </form>

@endsection