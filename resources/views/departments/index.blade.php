@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="fieldset">
        <div class="col-md-9">
            <h2>Departamentos</h2>
        </div>
        <div class="col-md-3 pull-right">
            <a href="{{url('departamentos/cadastro')}}" class="mg-h2 btn btn-success form-control">Novo Departamento</a>
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
                    @foreach($departments as $department)
                        <tr>
                            <td>{{$department->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="/departamentos/{{$department->id}}/editar">Editar</a></li>
                                        <li>
                                            <a href="javascript:document.getElementById('form_delete{{$department->id}}').submit();">Excluir</a>
                                            <form method="POST" id="form_delete{{$department->id}}" action="/departamentos/{{$department->id}}/deletar">
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