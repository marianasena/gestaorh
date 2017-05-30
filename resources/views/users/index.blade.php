@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="fieldset">
        <div class="col-md-9">
            <h2>Usuários</h2>
        </div>
        <div class="col-md-3 pull-right">
            <a href="{{url('usuarios/cadastro')}}" class="mg-h2 btn btn-success form-control">Novo Usuário</a>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Nome</th>
                    <th class="col-md-1"></th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="/usuarios/{{$user->id}}/editar">Editar</a></li>
                                        <li>
                                            <a href="javascript:document.getElementById('form_delete{{$user->id}}').submit();">Excluir</a>
                                            <form method="POST" id="form_delete{{$user->id}}" action="/usuarios/{{$user->id}}/deletar">
                                                {{method_field('DELETE')}}
                                                {!! csrf_field() !!}
                                                <button type="submit" class="hide">Excluir</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection