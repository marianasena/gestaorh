@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Novo Aprovador</h2>
        </div>
    </div>

    <form method="post" action="{{route('approver_store')}}">
        {!! csrf_field() !!}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="user">Status</label>
                    <select class="form-control" name="status">
                        <option value="">Selecione o Status</option>
                        @foreach($request_status as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                    <label for="user">Usuário</label>
                    <select class="form-control" name="user">
                        <option value="">Selecione o Usuário Aprovador</option>
                        <option value="">Responsável pelo Departamento/Filial</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                    </span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{route('approvers')}}">Voltar</a>
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