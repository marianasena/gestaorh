<?php

namespace App\Http\Controllers;

use App\UnemploymentReason;
use Illuminate\Http\Request;

class UnemploymentReasonsController extends Controller
{
    private $validationRules = [
        'nome' => 'required|min:5',
        'descricao' => 'required|min:20'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unemploymentreasons = UnemploymentReason::orderBy('name', 'asc')->get();
        return view('unemploymentreasons.index', compact('unemploymentreasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unemploymentreasons.create');
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

        $reason = new UnemploymentReason();
        $reason->name = $request['nome'];
        $reason->description = $request['descricao'];


        if ($reason->save()){
            flash('Motivo de Desligamento cadastrado com sucesso!')->success();
        }else
            flash('Não foi possível cadastrar o Motivo de Desligamento. Verifique os campos e tente novamente.')->error();

        //retorno pra view
        return redirect(route('unemployment_reasons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnemploymentReason  $unemploymentReason
     * @return \Illuminate\Http\Response
     */
    public function show(UnemploymentReason $unemploymentReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnemploymentReason  $unemploymentReason
     * @return \Illuminate\Http\Response
     */
    public function edit(UnemploymentReason $unemploymentReason)
    {
        return view('unemploymentreasons.edit', compact('unemploymentReason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnemploymentReason  $unemploymentReason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnemploymentReason $unemploymentReason)
    {
        $this->validate($request, $this->validationRules);

        $unemploymentReason->name = $request['nome'];
        $unemploymentReason->description = $request['descricao'];

        if ($unemploymentReason->save()) {
            flash('Motivo de Desligamento editado com sucesso!')->success();
        }else
            flash('Não foi possível editar o Motivo de Desligamento. Verifique os campos e tente novamente.')->error();

        return redirect(route('unemployment_reasons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnemploymentReason  $unemploymentReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnemploymentReason $unemploymentReason)
    {
        if ($unemploymentReason->delete())
            flash('Motivo de Desligamento excluído com sucesso!')->success();
        else
            flash('Não foi possível excluir o Motivo de Desligamento. Verifique os campos e tente novamente.')->error();

        return redirect(route('unemployment_reasons'));
    }
}
