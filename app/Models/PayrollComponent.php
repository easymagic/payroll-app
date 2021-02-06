<?php

namespace App\Models;

use App\Traits\RequestGrab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollComponent extends Model
{
    use HasFactory;
    use RequestGrab;





    function newPayrollComponent(){

       $this->take('name');
       $this->take('type');
       $this->take('value_type');
       $this->take('value');

       $this->save();

       return $this;
    }

    function updatePayrollComponent(){

        $this->take('name');
        $this->take('type');
        $this->take('value_type');
        $this->take('value');

        $this->save();

        return $this;

    }

}
