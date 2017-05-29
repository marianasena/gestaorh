<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    private $validationRules = [
        'nome' => 'required|min:5'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);

        $department = new Department;
        $department->name = $request['nome'];

        if ($department->save())
            flash('Departamento cadastrado com sucesso!')->success();
        else
            flash('Não foi possível cadastrar o Departamento. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('departamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, $this->validationRules);

        $department->name = $request['nome'];

        if ($department->save())
            flash('Departamento editado com sucesso!')->success();
        else
            flash('Não foi possível editar o Departamento. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if ($department->delete())
            flash('Departamento excluído com sucesso!')->success();
        else
            flash('Não foi possível excluir o Departamento. Verifique os campos e tente novamente.')->error();

        return redirect('departamentos');
    }
}
