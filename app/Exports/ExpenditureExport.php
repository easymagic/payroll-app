<?php


namespace App\Exports;


use App\Models\Expenditure;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpenditureExport implements FromCollection
{

    public function collection()
    {
        // TODO: Implement collection() method.
        $list = Expenditure::all();

//        dd($list);

        return $list;
    }


}
