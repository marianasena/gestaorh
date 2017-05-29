<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Branch;
use App\Department;
use App\BranchDepartment;

class BranchesController extends Controller
{
    private $validationRules = [
        'nome' => 'required|min:10',
        'sigla' => 'required|min:2|max:5'
    ];

    public function index(){
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    public function edit(Branch $branch){
        $allDepartments = Department::orderBy('name', 'asc')->get();
        $selectedDepartments = $branch->departments()->pluck('id')->all();

        return view('branches.show', [
            'branch' => $branch,
            'allDepartments' => $allDepartments,
            'selectedDepartments' => $selectedDepartments
        ]);
    }

    public function create(){
        $departments = Department::orderBy('name', 'asc')->get();
        return view('branches.create', compact('departments'));
    }

    public function store(Request $request){

        $this->validate($request, $this->validationRules);

        $branch = new Branch;
        $branch->name = $request['nome'];
        $branch->initials = $request['sigla'];
        $departments = $request['departamentos'];


        if ($branch->save()){
            $branch->departments()->attach($departments);
            flash('Filial cadastrada com sucesso!')->success();
        }else
            flash('Não foi possível cadastrar a filial. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('filiais');

    }

    public function update(Branch $branch, Request $request){

        $this->validate($request, $this->validationRules);

        $branch->name = $request['nome'];
        $branch->initials = $request['sigla'];

        if ($branch->save()) {
            $branch->departments()->sync($request['departamentos']);
            flash('Filial editada com sucesso!')->success();
        }else
            flash('Não foi possível editar a filial. Verifique os campos e tente novamente.')->error();

        return redirect('filiais');
    }

    public function destroy(Branch $branch){

        if ($branch->delete())
            flash('Filial excluída com sucesso!')->success();
        else
            flash('Não foi possível excluir a filial. Verifique os campos e tente novamente.')->error();

        return redirect('filiais');
    }

}
