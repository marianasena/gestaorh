<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private $validationRules = [
        'name' => 'required|min:5',
        'department_id' => 'required',
        'branch_id' => 'required',
        'role_id' => 'required',
        'admitted_at' => 'required',
        'salary' => 'required'
    ];


    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        return view('employees.create', [
            'departments' => $departments
        ]);
    }


}
