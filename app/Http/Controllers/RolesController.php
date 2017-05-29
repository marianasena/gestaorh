<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    private $validationRules = [
        'nome' => 'required|min:5'
    ];

    public function index(){
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request){

        $this->validate($request, $this->validationRules);

        $role = new Role;
        $role->name = $request['nome'];

        if ($role->save())
            flash('Cargo cadastrado com sucesso!')->success();
        else
            flash('Não foi possível cadastrar o Cargo. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('cargos');


    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, $this->validationRules);

        $role->name = $request['nome'];

        if ($role->save())
            flash('Cargo editado com sucesso!')->success();
        else
            flash('Não foi possível editar o Cargo. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('cargos');
    }

    public function destroy(Role $role)
    {
        if ($role->delete())
            flash('Cargo excluído com sucesso!')->success();
        else
            flash('Não foi possível excluir o Cargo. Verifique os campos e tente novamente.')->error();

        return redirect('cargos');
    }
}
