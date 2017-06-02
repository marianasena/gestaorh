<?php

namespace App\Http\Controllers;

use App\Approver;
use App\Branch;
use App\RequestStatus;
use App\User;
use Illuminate\Http\Request;

class ApproversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvers = Approver::with('user', 'request_status')->get();
        return view('approvers.index', compact('approvers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        $request_status = RequestStatus::orderBy('name')->get();
        $branches = Branch::orderBy('name')->get();

        return view('approvers.create',[
            'users' => $users,
            'request_status' => $request_status,
            'branches' => $branches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'user' => 'required'
        ], [], [
            'status' => 'Status',
            'user' => 'Usuário'
        ]);

        $approver = new Approver;
        $approver->user_id = $request['user'];
        $approver->request_status_id = $request['status'];
        $approver->branch_id = $request['branch'];
        $approver->department_id = $request['department_id'];

        if ($approver->save()){
            flash('Aprovador cadastrado com sucesso!')->success();
        }else{
            flash('Não foi possível cadastrar o Aprovador. Verifique os campos e tente novamente.')->error();
        }

        //retorno pra view
        return redirect(route('approvers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function show(Approver $approver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function edit(Approver $approver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approver $approver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approver $approver)
    {
        if ($approver->delete()){
            flash('Aprovador excluído com sucesso!')->success();
        }else{
            flash('Não foi possível excluído o Aprovador. Verifique os campos e tente novamente.')->error();
        }

        return redirect(route('approvers'));
    }
}
