<?php

namespace App\Http\Controllers;

use App\Approver;
use App\Manager;
use App\RequestStatus;
use App\UnemploymentRequest;
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
            'employee' => 'required|min:1',
            'reason' => 'required',
            'justification' => 'required|min:20',
            'expected_at' => 'required|date|after:yesterday',
        ], [
            'expected_at.after' => 'Data da Dispensa não pode ser uma data anterior a hoje'
        ], [
            'employee' => 'Funcionário',
            'justification' => 'Justificativa',
            'reason' => 'Motivo',
            'expected_at' => 'Data da Dispensa',
        ]);

        //get the first status -- status default for a just opened request
        $status = RequestStatus::where('order', '=', 1)->firstOrFail();

        $unemployment_request = new UnemploymentRequest;
        $unemployment_request->request_status_id = $status->id;
        $unemployment_request->employee_id = $request['employee'];
        $unemployment_request->user_id = Auth::user()->id;
        $unemployment_request->unemployment_reason_id =$request['reason'];
        $unemployment_request->justification =$request['justification'];
        $unemployment_request->expected_at =$request['expected_at'];

        if (!$unemployment_request->save()){
            flash('Não foi possível solicitar o Desligamento. Verifique os campos e tente novamente.')->error();

            //retorno pra view
            return redirect(route('unemployment_reason_create'));
        }

        $employee = Employee::find($request['employee']);
        $approvers = $status->approvers()->where(function($query) use ($employee){
            $query->where('branch_id', $employee->branch_id)
                  ->orwhereNull('branch_id');
        })->where(function($query) use ($employee){
            $query->where('department_id', $employee->department_id)
                  ->orwhereNull('department_id');
        })->get();



        foreach ($approvers as $approver){



            //notifica aprovador




        }

        return redirect(route('home'));



      /*  if ($unemployment_request->save()){
            //notifica aprovador -- aprovadores
        }else{

        }


        //$model = App\Flight::where('legs', '>', 100)->firstOrFail();

        //gravar, notificar próximo aprovador */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UnemploymentRequest $unemploymentRequest)
    {
       // return $unemploymentRequest;
        return view('requests.unemployments.show', compact('unemploymentRequest'));
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
