<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnemploymentReason;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Auth;

class UnemploymentRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reasons = UnemploymentReason::orderBy('name', 'asc')->get();
        $employees = Employee::all();
        $user = User::find(Auth::id());
        return view('requests.unemployments.create', [
            'reasons' => $reasons,
            'employees' => $employees
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
            //'funcionario' => 'required|min:1',
            'justification' => 'required',
            'reason' => 'required',
          //  'justificativa' => 'required|min:20',
          //  'dispensa' => 'required|date|after:tomorrow',
        ], [], [
            'justification' => 'Justificativa',
            'reason' => 'Motivo',
            'reason' => 'Data da Dispensa',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
