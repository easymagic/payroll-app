<?php

namespace App\Http\Controllers;

use App\Models\PayrollComponent;
use App\Traits\RedirectHelper;
use Illuminate\Http\Request;

class PayrollComponentController extends Controller
{
    use RedirectHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = PayrollComponent::all();

        return view('payroll_component.index',compact(['list']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = (new PayrollComponent)->newPayrollComponent();

        return $this->respondBack([
            'message'=>'New payroll component added.',
            'error'=>false,
            'data'=>$data
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayrollComponent  $payrollComponent
     * @return \Illuminate\Http\Response
     */
    public function show(PayrollComponent $payrollComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayrollComponent  $payrollComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(PayrollComponent $payrollComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayrollComponent  $payrollComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayrollComponent $payrollComponent)
    {
        //
        $data = $payrollComponent->updatePayrollComponent();

        return $this->respondBack([
            'message'=>'Payroll component saved.',
            'error'=>false,
            'data'=>$data
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayrollComponent  $payrollComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayrollComponent $payrollComponent)
    {
        //
        $payrollComponent->delete();
        return $this->respondBack([
            'message'=>'Payroll component removed',
            'error'=>false
        ]);
    }
}
