
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
                        <div class="list-group">
                            <a href="#" class="list-group-item active col-md-12">
                                <div class="pull-left icon-select"><span class="glyphicon glyphicon-unchecked"></span></div>
                                <div class="col-md-11">
                                    <h4 class="list-group-item-heading">First List Group Item Heading</h4>
                                    <p class="list-group-item-text">List Group Item Text</p>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
                                <p class="list-group-item-text">List Group Item Text</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">Third List Group Item Heading</h4>
                                <p class="list-group-item-text">List Group Item Text</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>

@endsection
