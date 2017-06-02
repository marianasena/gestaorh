@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="fieldset">
        <div class="col-md-9">
            <h2>Solicitações de Desligamento em Aberto</h2>
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
                    <th>Data</th>
                    <th>Status</th>
                    <th>Solicitante</th>
                    <th>Filial</th>
                    <th>Departamento</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($unemploymentRequests as $request)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($request->created_at)->format('d/m/Y') }}</td>
                            <td>{{$request->request_status->name}}</td>
                            <td>{{$request->user->name}}</td>
                            <td>{{$request->employee->branch->name}}</td>
                            <td>{{$request->employee->department->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{route('unemployment_request_show', ['unemploymentRequest' => $request->id])}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection