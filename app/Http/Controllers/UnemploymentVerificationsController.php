<?php

namespace App\Http\Controllers;

use App\UnemploymentVerification;
use Illuminate\Http\Request;

class UnemploymentVerificationsController extends Controller
{
    private $validationRules = [
        'nome' => 'required|min:5',
        'descricao' => 'required',
        'resultado' => 'required|bool'
    ];

    public function index(){
        $unemploymentVerifications = UnemploymentVerification::all();
        return view('unemploymentverifications.index', compact('unemploymentVerifications'));
    }

    public function create()
    {
        return view('unemploymentverifications.create');
    }

    public function store(Request $request, UnemploymentVerification $unemploymentVerification){

        $this->validate($request, $this->validationRules);

        $unemploymentVerification->name = $request['nome'];
        $unemploymentVerification->description = $request['descricao'];
        $unemploymentVerification->result = $request['resultado'];

        if ($unemploymentVerification->save())
            flash('Validação cadastrada com sucesso!')->success();
        else
            flash('Não foi possível cadastrar a Validação. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect(route('unemployment_verifications'));

    }

    public function edit(UnemploymentVerification $unemploymentVerification)
    {
        return view('unemploymentverifications.edit', compact('unemploymentVerification'));
    }

    public function update(Request $request, UnemploymentVerification $unemploymentVerification)
    {
        $this->validate($request, $this->validationRules);

        $unemploymentVerification->name = $request['nome'];
        $unemploymentVerification->description = $request['descricao'];
        $unemploymentVerification->result = $request['resultado'];

        if ($unemploymentVerification->save()) {
            flash('Validação de Desligamento editada com sucesso!')->success();
        }else
            flash('Não foi possível editar a Validação de Desligamento. Verifique os campos e tente novamente.')->error();

        return redirect(route('unemployment_verifications'));
    }

    public function destroy(UnemploymentVerification $unemploymentVerification)
    {
        if ($unemploymentVerification->delete())
            flash('Validação de Desligamento excluída com sucesso!')->success();
        else
            flash('Não foi possível excluir a Validação de Desligamento. Verifique os campos e tente novamente.')->error();

        return redirect(route('unemployment_verifications'));
    }

}
