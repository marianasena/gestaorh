
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Funcionário</label>
                <input type="text" class="form-control" value="" placeholder="Nome do Funcionário" />
            </div>
        </div>
    </div>

    </form>

@endsection
