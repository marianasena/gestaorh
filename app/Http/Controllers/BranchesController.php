<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Branch;

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

    public function show(Branch $branch){
        return view('branches.show', compact('branch'));
    }

    public function create(){
        return view('branches.create');
    }

    public function store(Request $request){

        $this->validate($request, $this->validationRules);

        $branch = new Branch;
        $branch->name = $request['nome'];
        $branch->initials = $request['sigla'];

        if ($branch->save())
            flash('Filial cadastrada com sucesso!')->success();
        else
            flash('Não foi possível cadastrar a filial. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect('filiais');

    }

    public function update(Branch $branch, Request $request){

        $this->validate($request, $this->validationRules);

        $branch->name = $request['nome'];
        $branch->initials = $request['sigla'];

        if ($branch->save())
            flash('Filial editada com sucesso!')->success();
        else
            flash('Não foi possível editar a filial. Verifique os campos e tente novamente.')->error();

        return redirect('filiais');
    }

    public function delete(Branch $branch){

        if ($branch->delete())
            flash('Filial excluída com sucesso!')->success();
        else
            flash('Não foi possível excluir a filial. Verifique os campos e tente novamente.')->error();

        return redirect('filiais');
    }

}
