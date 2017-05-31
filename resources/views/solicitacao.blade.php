
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
                        <input type="text" class="form-control" disabled="disabled" value="Mariana Moreira Sena" />
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
                        <input type="text" class="form-control" disabled="disabled" value="Setor de Informática" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Unidade</label>
                        <input type="text" class="form-control" disabled="disabled" value="Treviso Betim" />
                    </div>
                </div>
            </div>
        </div>
    </div>



    <form method="post">
        <div class="panel panel-primary">
            <div class="panel-heading">Funcionário</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome do Funcionário</label>
                            <input type="text" class="form-control" value="" placeholder="Nome do Funcionário" />
                        </div>
                    </div>
                </div>
                <div class="collapse in" id="collapseExample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Setor</label>
                                <input type="text" class="form-control" value="" placeholder="26/05/1994" disabled="disabled" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unidade</label>
                                <input type="text" class="form-control" value="" placeholder="26/05/1994" disabled="disabled" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Matrícula</label>
                                <input type="text" class="form-control" value="" placeholder="426201" disabled="disabled" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Data de Admissão</label>
                                <input type="text" class="form-control" value="" placeholder="26/05/1994" disabled="disabled" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input type="text" class="form-control" value="" placeholder="426201" disabled="disabled" />
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
                        <div class="form-group">
                            <label class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="test" value="0" />
                            </span>
                                <div class="form-control form-control-static">
                                    Radio NO
                                </div>
                                <span class="glyphicon form-control-feedback"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="test" value="1" />
                            </span>
                                <div class="form-control form-control-static form-control-checkbox">
                                    <p>
                                        Radio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YES
                                        Radio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YESRadio YES
                                    </p>
                                    <small><em>Teste</em></small>
                                </div>
                                <span class="glyphicon form-control-feedback "></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>

@endsection
