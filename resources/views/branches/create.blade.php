@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Nova Filial</h2>
        </div>
    </div>

    <form method="post" action="{{url('filiais')}}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{old('nome')}}" class="form-control" id="nome">
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
                    <input type="text" name="sigla" value="{{old('sigla')}}"  class="form-control" id="sigla">
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
            @foreach($departments as $department)
                <div class="col-md-12 list-group-item" >
                    <input type="checkbox" id="dep{{$department->id}}" value="{{$department->id}}" name="departamentos[]" />
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

@section('scripts)
    <script type="text/javascript">
        $(document).ready(function(){
            $('.list-group-item > input[type=checkbox]').click(function(){
                $(this).parent().toggleClass('active');
            });
        })     ;
    </script>

@endsection