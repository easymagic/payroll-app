<?php

namespace App\Models;

use App\Traits\RequestGrab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    use RequestGrab;


    function payroll_components(){
        return $this->hasMany(GradePayrollComponent::class,'grade_id');
    }

    function user(){
        return $this->hasOne(User::class,'grade_id');
    }

//    function scopeGetPayrollBreakDownByUser(Builder $builder,$userId){
//        return $builder->whereHas('user',function(Builder $builder) use ($userId) {
//            return $builder->where('id',$userId);
//        });
//    }


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
