<?php

namespace App\Models;

use App\Traits\RequestGrab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    use RequestGrab;


    function payroll_components(){
        return $this->hasMany(GradePayrollComponent::class,'grade_id');
    }


    function newGrade(){

        $this->take('name');
        $this->take('amount');
        $this->save();

        return $this;
    }


    function updateGrade(){

        $this->take('name');
        $this->take('amount');
        $this->save();

        return $this;
    }

}
