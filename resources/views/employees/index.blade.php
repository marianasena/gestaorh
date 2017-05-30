@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="fieldset">
        <div class="col-md-9">
            <h2>Funcionários</h2>
        </div>
        <div class="col-md-3 pull-right">
            <a href="{{url('funcionarios/cadastro')}}" class="mg-h2 btn btn-success form-control">Novo Funcionário</a>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Filial</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Admissão</th>
                    <th class="col-md-1"></th>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->registration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->branch->name }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>{{ $employee->role->name }}</td>
                            <td>{{ Carbon\Carbon::parse($employee->admitted_at)->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="/funcionarios/{{$employee->id}}/editar">Editar</a></li>
                                        <li>
                                            <a href="javascript:document.getElementById('form_delete{{$employee->id}}').submit();">Excluir</a>
                                            <form method="POST" id="form_delete{{$employee->id}}" action="/funcionarios/{{$employee->id}}/deletar">
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