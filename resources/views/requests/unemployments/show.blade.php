
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h2>Solicitação de Desligamento</h2>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Solicitante</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Nome do Solicitante</label>
                        <input type="text" class="form-control" disabled="disabled" value="{{Auth::user()->name}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Data da Solicitação</label>
                        <input type="text" class="form-control" disabled="disabled" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Setor</label>
                        <input type="text" class="form-control" disabled="disabled" value="{{Auth::user()->department->name}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Unidade</label>
                        <input type="text" class="form-control" disabled="disabled" value="{{Auth::user()->branch->name}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="panel panel-primary">
        <div class="panel-heading">Funcionário</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nome do Funcionário</label>
                        <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{$unemploymentRequest->employee->name}}" placeholder="Nome do Funcionário" disabled/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Setor</label>
                        <input type="text" class="form-control" value="{{$unemploymentRequest->employee->department->name}}" id="department_name" disabled="disabled" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Unidade</label>
                        <input type="text" class="form-control" value="{{$unemploymentRequest->employee->branch->name}}" id="branch_name" disabled="disabled" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Matrícula</label>
                        <input type="text" class="form-control" id="registration" value="{{$unemploymentRequest->employee->registration}}" disabled="disabled" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Data de Admissão</label>
                        <input type="text" class="form-control" id="admitted_at" value="{{$unemploymentRequest->employee->admitted_at}}"  disabled="disabled" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" class="form-control" id="role_name" disabled="disabled" value="{{$unemploymentRequest->employee->role->name}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Desligamento</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <h4>Motivo</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="input-group">
                            <div class="form-control form-control-static form-control-checkbox">
                                <p>
                                    {{$unemploymentRequest->unemployment_reason->name}}
                                </p>
                                <small><em> {{$unemploymentRequest->unemployment_reason->description}}</em></small>
                            </div>
                            <span class="glyphicon form-control-feedback "></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Justificativa</label>
                        <textarea name="justification" class="form-control">{{$unemploymentRequest->justification}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Data da Dispensa</label>
                        <input type="text" name="expected_at" value="{{$unemploymentRequest->expected_at}}" class="form-control" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Histórico</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('unemployment_request_store')}}">
        {{ csrf_field()  }}
        <div class="panel panel-primary">
            <div class="panel-heading">Aprovação</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Justificativa</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <a class="btn btn-success form-control" href="{{route('unemployment_reasons')}}">Aprovar</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <a class="btn btn-danger form-control" href="{{route('unemployment_reasons')}}">Reprovar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>

@endsection

@section('scripts')
@endsection