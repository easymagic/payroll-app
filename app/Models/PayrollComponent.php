<?php

namespace App\Models;

use App\Traits\RequestGrab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollComponent extends Model
{
    use HasFactory;
    use RequestGrab;

    function grade_payroll_component(){
        return $this->hasMany(GradePayrollComponent::class,'payroll_component_id');
    }

    function scopeGetPayrollBreakDownByUser(Builder $builder , $userId){
      return $builder->whereHas('grade_payroll_component',function(Builder $builder) use ($userId){
          return $builder->whereHas('grade',function (Builder $builder) use ($userId){

              return $builder->whereHas('user',function(Builder $builder) use ($userId){

                  return $builder->where('id',$userId);

              });

          });
      });
    }


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
