@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="fieldset">
        <div class="col-md-9">
            <h2>Validações de Desligamento</h2>
        </div>
        <div class="col-md-3 pull-right">
            <a href="{{route('unemployment_verification_create')}}" class="mg-h2 btn btn-success form-control">Nova Validação de Desligamento</a>
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
                    @foreach($unemploymentVerifications as $unemploymentVerification)
                        <tr>
                            <td>{{$unemploymentVerification->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('unemployment_verification_edit', ['$unemploymentVerification' => $unemploymentVerification->id]) }}">Editar</a></li>
                                        <li>
                                            <a href="javascript:document.getElementById('form_delete{{$unemploymentVerification->id}}').submit();">Excluir</a>
                                            <form method="POST" id="form_delete{{$unemploymentVerification->id}}" action="{{ route('unemployment_verification_destroy', ['$unemploymentVerification' => $unemploymentVerification->id]) }}">

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