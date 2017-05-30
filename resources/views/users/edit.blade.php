@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Editar Departamento</h2>
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

    <form method="post" action="/departamentos/{{$department->id}}/editar/">
        {!! csrf_field() !!}
        {{method_field('PATCH')}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{$department->name}}" class="form-control" id="nome">
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
                    <a class="btn btn-default form-control" href="{{url('departamentos')}}">Voltar</a>
                </div>
            </div>
        </div>

    </form>

@endsection