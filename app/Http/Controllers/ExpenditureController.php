<?php

namespace App\Http\Controllers;

use App\Exports\ExpenditureExport;
use App\Models\Category;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

//use Maatwebsite\Excel\Excel;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $list = Expenditure::fetch()->paginate(10);
        return view('expenditure.index',compact(['list','categories']));
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
        $data = (new Expenditure)->createExpenditure();

        return redirect()->back()->with([
            'message'=>'New expenditure added',
            'error'=>false,
            'data'=>$data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show(Expenditure $expenditure)
    {
        //

        $result = $expenditure->isExpenditureOverTime();
        dd($result);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        //

        if ($expenditure->isExpenditureOverTime()){
            return redirect()->back()->with([
                'message'=>'Cannot edit expenditure over 2mins!',
                'error'=>true
            ]);
        }

        if ($expenditure->isExpenditureAcive()){
            return redirect()->back()->with([
                'message'=>'Cannot edit expenditure that is active!',
                'error'=>true
            ]);
        }

        if (request()->filled('activate')){
            $data = $expenditure->activate();
            return redirect()->back()->with([
                'message'=>'Expenditure activated',
                'error'=>false,
                'data'=>$data
            ]);
        }


        if (request()->filled('deactivate')){
            $data = $expenditure->deactivate();
            return redirect()->back()->with([
                'message'=>'Expenditure deactivated',
                'error'=>false,
                'data'=>$data
            ]);
        }


        $data = $expenditure->updateExependiture();

        return redirect()->back()->with([
            'message'=>'Expenditure saved',
            'error'=>false,
            'data'=>$data
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenditure $expenditure)
    {
        //
    }

    function export(){

        return Excel::download(new ExpenditureExport(),'export.xlsx');

//      Excel::download(new ExpenditureExport(),'export.xls');
    }


}
