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

    static function isRan($month_year,$user_id){
        $query = (new self)->newQuery();
        $query = $query->where('month_year',$month_year)->where('user_id',$user_id);
        return $query->exists();
    }

    function savePayroll($data){

        if (!$this->isRan($data['month_year'],$data['user_id'])){

            $this->month_year = $data['month_year'];
            $this->allowances = $data['allowances'];
            $this->deductions = $data['deductions'];
            $this->user_id = $data['user_id'];
            $this->gross_pay = $data['gross_pay'];
            $this->net_pay = $data['net_pay'];
            $this->save();
        }


    }






}
