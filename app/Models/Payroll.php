<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;


    function fetch(){

        $query = (new self)->newQuery();




        return $query;
    }

    function getThisMonthYear(){
        return date('Y-m');
    }

    function scopeThisMonth(Builder $builder){
        $month_year = $this->getThisMonthYear();
        return $builder->where('month_year',$month_year);
    }

    function scopeTotal(Builder $builder){
        return $builder;
    }





}
