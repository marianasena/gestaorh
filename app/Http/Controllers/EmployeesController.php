<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Employee;
use App\Department;
use App\Role;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private $validationRules = [
        'nome' => 'required|min:5',
        'departamento' => 'required',
        'filial' => 'required',
        'cargo' => 'required',
        'matricula' => 'required',
        'admissao' => 'required',
        'salario' => 'required|numeric'
    ];


    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function getAll(){
        return Employee::with('branch', 'department', 'role')->get();
}

    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $branches = Branch::orderBy('name', 'asc')->get();
        $roles = Role::orderBy('name', 'asc')->get();
        return view('employees.create', [
            'departments' => $departments,
            'branches' => $branches,
            'roles' => $roles
        ]);
    }

    public function store(Request $request, Employee $employee){

        $this->validate($request, $this->validationRules);

        $employee->name = $request['nome'];
        $employee->department_id = $request['departamento'];
        $employee->branch_id = $request['filial'];
        $employee->role_id = $request['cargo'];
        $employee->registration = $request['matricula'];
        $employee->admitted_at = $request['admissao'];
        $employee->salary = $request['salario'];

        if ($employee->save())
            flash('Funcionário cadastrado com sucesso!')->success();
        else
            flash('Não foi possível cadastrar o Funcionário. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('funcionarios');


    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $branches = Branch::orderBy('name', 'asc')->get();
        $roles = Role::orderBy('name', 'asc')->get();
        return view('employees.edit', [
            'employee' => $employee,
            'departments' => $departments,
            'branches' => $branches,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, $this->validationRules);
        $employee->name = $request['nome'];
        $employee->department_id = $request['departamento'];
        $employee->branch_id = $request['filial'];
        $employee->role_id = $request['cargo'];
        $employee->registration = $request['matricula'];
        $employee->admitted_at = $request['admissao'];
        $employee->salary = $request['salario'];

        if ($employee->save())
            flash('Funcionário editado com sucesso!')->success();
        else
            flash('Não foi possível editar o Funcionário. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('funcionarios');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->delete())
            flash('Funcionário excluído com sucesso!')->success();
        else
            flash('Não foi possível excluir o Funcionário. Verifique os campos e tente novamente.')->error();
        return redirect('funcionarios');
    }


}
