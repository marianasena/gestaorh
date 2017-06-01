
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



    <form method="post" action="{{route('unemployment_request_store')}}">
        {{ csrf_field()  }}
        <input type="hidden" name="employee" id="employee" value="{{old('employee')}}" />
        <div class="panel panel-primary">
            <div class="panel-heading">Funcionário</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('employee') ? ' has-error' : '' }}">
                            <label>Nome do Funcionário</label>
                            <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{old('employee_name')}}" placeholder="Nome do Funcionário" />
                            <span class="help-block">
                                <strong>{{ $errors->first('employee') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapse_employee">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Setor</label>
                                <input type="text" class="form-control" value="" id="department_name" disabled="disabled" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unidade</label>
                                <input type="text" class="form-control" value="" id="branch_name" disabled="disabled" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Matrícula</label>
                                <input type="text" class="form-control" id="registration" disabled="disabled" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Data de Admissão</label>
                                <input type="text" class="form-control" id="admitted_at"  disabled="disabled" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input type="text" class="form-control" id="role_name" disabled="disabled" />
                            </div>
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
                        @foreach($reasons as $reason)
                            <div class="form-group {{ $errors->has('reason') ? ' has-error' : '' }}">
                                <label class="input-group">
                                    <span class="input-group-addon">
                                        <input type="radio" name="reason" value="{{$reason->id}}" {{ ( old('reason') == $reason->id ? 'checked="checked"' : '' )  }} />
                                    </span>
                                    <div class="form-control form-control-static form-control-checkbox">
                                        <p>
                                           {{$reason->name}}
                                        </p>
                                        <small><em> {{$reason->description}}</em></small>
                                    </div>
                                    <span class="glyphicon form-control-feedback "></span>
                                </label>
                            </div>
                        @endforeach
                        <div class="form-group {{ $errors->has('reason') ? ' has-error' : '' }}">
                            <span class="help-block">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('justification') ? ' has-error' : '' }}">
                            <label>Justificativa</label>
                            <textarea name="justification" class="form-control">{{old('justification')}}</textarea>
                            <span class="help-block">
                                <strong>{{ $errors->first('justification') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('expected_at') ? ' has-error' : '' }}">
                            <label>Data da Dispensa</label>
                            <input type="date" name="expected_at" value="{{old('expected_at')}}" class="form-control" />
                            <span class="help-block">
                                <strong>{{ $errors->first('expected_at') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{route('unemployment_reasons')}}">Cancelar</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Solicitar</button>
                </div>
            </div>
        </div>

    </form>

@endsection

@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){

            $.ajax({
                url: '{{route('getEmployees')}}',
                dataType: "json",
                success: function(data){
                    var validOptions = $.map( data, function( item ) {
                        return {
                            label: item.name,
                            value: item.name,
                            id: item.id,
                            branch_name: item.branch.name,
                            department_name: item.department.name,
                            admitted_at: item.admitted_at,
                            registration: item.registration,
                            role_name: item.role.name,

                        }});

                    //init autocomplete
                    $('#employee_name').autocomplete({
                        source: validOptions,
                        //all your other autocomplete settings
                        minLength: 2,
                        select: function( event, ui ) {
                            $('#branch_name').val(ui.item.branch_name);
                            $('#department_name').val(ui.item.department_name);
                            $('#admitted_at').val(ui.item.admitted_at);
                            $('#registration').val(ui.item.registration);
                            $('#role_name').val(ui.item.role_name);
                            $('#employee').val(ui.item.id);

                            $('#collapse_employee').slideDown();

                            return;
                        },
                        change: function (event, ui) {
                            if (ui.item == null){
                                //here is null if entered value is not match in suggestion list
                                $(this).val((ui.item ? ui.item.id : ""));
                                $('#employee').val(0);
                                $('#collapse_employee').slideUp();
                            }
                        }
                    });


                }
            });



        });
    </script>
@endsection