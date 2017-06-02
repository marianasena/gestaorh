@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Editar Filial</h2>
        </div>
    </div>

    <form method="POST" action="/filiais/{{$branch->id}}/editar/">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{$branch->name}}" class="form-control" id="nome">
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('sigla') ? 'has-error' : '' }}">
                    <label for="nome">Sigla</label>
                    <input type="text" name="sigla" value="{{$branch->initials}}" class="form-control" id="sigla">
                    <span class="help-block">
                        <strong>{{ $errors->first('sigla') }}</strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('departamentos') ? 'has-error' : '' }}">
                    <h4>Departamentos</h4>
                    <em>Departamentos da filial</em>
                </div>
            </div>
        </div>
        <div class="row list-group">
            <div class="col-md-12">
            @foreach($allDepartments as $department)
                <div class="list-group-item {{ (in_array($department->id, $selectedDepartments) ? 'active' : '') }}" >
                    <input type="checkbox" {{ (in_array($department->id, $selectedDepartments) ? 'checked="checked"' : '') }} id="dep{{$department->id}}" value="{{$department->id}}" name="departamentos[]" />
                    <label class="chk-label" for="dep{{$department->id}}">{{$department->name}}</label>
                </div>
            @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{url('filiais')}}">Voltar</a>
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

@section('js_files')
    <script src="{{ asset('js/forms.js') }}"></script>
@endsection