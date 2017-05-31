@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="fieldset">
        <div class="col-md-9">
            <h2>Motivos de Desligamento</h2>
        </div>
        <div class="col-md-3 pull-right">
            <a href="{{route('unemployment_reason_create')}}" class="mg-h2 btn btn-success form-control">Novo Motivo de Desligamento</a>
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
                    @foreach($unemploymentreasons as $unemploymentreason)
                        <tr>
                            <td>{{$unemploymentreason->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('unemployment_reason_edit', ['unemploymentReason' => $unemploymentreason->id]) }}">Editar</a></li>
                                        <li>
                                            <a href="javascript:document.getElementById('form_delete{{$unemploymentreason->id}}').submit();">Excluir</a>
                                            <form method="POST" id="form_delete{{$unemploymentreason->id}}" action="{{ route('unemployment_reason_destroy', ['unemploymentReason' => $unemploymentreason->id]) }}">

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