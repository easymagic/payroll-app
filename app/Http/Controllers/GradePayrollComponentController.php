<?php

namespace App\Http\Controllers;

use App\Models\GradePayrollComponent;
use App\Traits\RedirectHelper;
use Illuminate\Http\Request;

class GradePayrollComponentController extends Controller
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
        $response = (new GradePayrollComponent)->newGradePayrollComponent();

        return $this->respondBack([
            'message'=>'Payroll component added.',
            'error'=>false,
            'data'=>$response
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GradePayrollComponent  $gradePayrollComponent
     * @return \Illuminate\Http\Response
     */
    public function show(GradePayrollComponent $gradePayrollComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradePayrollComponent  $gradePayrollComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(GradePayrollComponent $gradePayrollComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradePayrollComponent  $gradePayrollComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradePayrollComponent $gradePayrollComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradePayrollComponent  $gradePayrollComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradePayrollComponent $gradePayrollComponent)
    {
        //
        $gradePayrollComponent->delete();
        return $this->respondBack([
            'message'=>'Grade component removed',
            'error'=>false
        ]);
    }
}
