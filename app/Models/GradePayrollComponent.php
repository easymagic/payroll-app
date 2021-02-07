<?php

namespace App\Models;

use App\Traits\RedirectHelper;
use App\Traits\RequestGrab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradePayrollComponent extends Model
{
    use HasFactory;
    use RequestGrab;

    function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    function payroll_component(){
        return $this->belongsTo(PayrollComponent::class,'payroll_component_id');
    }

    function scopeGetPayrollBreakDownByUser(Builder $builder,$userId){
        return $builder->whereHas('grade',function(Builder $builder) use ($userId){

            $builder->whereHas('user',function(Builder $builder) use ($userId){
                return $builder->where('id',$userId);
            });

        });
    }


    function newGradePayrollComponent(){
        $this->take('grade_id');
        $this->take('payroll_component_id');
        $this->save();
        return $this;
    }


}
