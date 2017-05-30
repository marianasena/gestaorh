@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Editar Funcionário</h2>
        </div>
    </div>

    @if (count($errors) > 0)
        @include('layouts.error')
    @endif

    <form method="post" action="/funcionarios/{{$employee->id}}/editar/">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="row">

            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{ $employee->name }}" class="form-control" id="nome">
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="form-group {{ $errors->has('departamento') ? 'has-error' : '' }}">
                    <label for="departamento">Departamento</label>
                    <select name="departamento" id="departamento" class="form-control" data-value="{{$employee->department_id}}">
                        <option value="">Selecione o departamento</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                        <strong>{{ $errors->first('departamento') }}</strong>
                    </span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group {{ $errors->has('filial') ? 'has-error' : '' }}">
                    <label for="filial">Filial</label>
                    <select name="filial" id="filial" class="form-control" data-value="{{$employee->branch_id}}">
                        <option value="">Selecione a filial</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{  $branch->name }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                        <strong>{{ $errors->first('filial') }}</strong>
                    </span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                    <label for="cargo">Cargo</label>
                    <select name="cargo" id="cargo" class="form-control" data-value="{{$employee->role_id}}">
                        <option value="">Selecione o cargo</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                        <strong>{{ $errors->first('cargo') }}</strong>
                    </span>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
                    <label for="matricula">Matrícula</label>
                    <input type="text" class="form-control" name="matricula" value="{{ $employee->registration }}" id="matricula">
                    <span class="help-block">
                        <strong>{{ $errors->first('matricula') }}</strong>
                    </span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group {{ $errors->has('admissao') ? 'has-error' : '' }}">
                    <label for="admissao">Data de Admissão</label>
                    <input type="date" name="admissao" value="{{ $employee->admitted_at }}" id="admissao" class="form-control">
                    <span class="help-block">
                        <strong>{{ $errors->first('admissao') }}</strong>
                    </span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group {{ $errors->has('salario') ? 'has-error' : '' }}">
                    <label for="salario">Salário</label>
                    <input type="number" min="0" name="salario" value="{{ $employee->salary }}" id="salario" class="form-control">
                    <span class="help-block">
                        <strong>{{ $errors->first('salario') }}</strong>
                    </span>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-3 col-md-offset-6 col-xs-6">
                <div class="form-group">
                    <a class="btn btn-default form-control" href="{{url('funcionarios')}}">Voltar</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
                </div>
            </div>
        </div>

    </form>

@endsection

@section('js_files')
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
@endsection