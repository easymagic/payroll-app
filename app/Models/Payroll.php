<?php

namespace App\Models;

use App\Policies\OwnershipPolicy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payroll extends Model
{
    use HasFactory;

    use OwnershipPolicy;


    static function fetch(){

        $type = Auth::user()->type;
        $userId = Auth::user()->id;

        $query = (new self)->newQuery();

        $query = $query->when(request()->filled('month_year'),function (Builder $builder){

            return $builder->where('month_year', request('month_year'));

        });

        if (!request()->filled('month_year')){
            $query = $query->where('month_year',date('Y-m'));
        }

        if ($type != 'admin'){
            $query = $query->where('user_id',$userId);
        }

        return $query;
    }

    function getThisMonthYear(){
        return date('Y-m');
    }


    function scopeThisMonth(Builder $builder){
        $month_year = $this->getThisMonthYear();
        $builder = self::checkNonAdmin($builder,'user_id');
        return $builder->where('month_year',$month_year);
    }

    function scopeTotal(Builder $builder){
        $builder = self::checkNonAdmin($builder,'user_id');
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

    function getYearText(){
        $carbon = Carbon::create($this->month_year);
        return $carbon->year;
    }
    function getMonthText(){
        $carbon = Carbon::create($this->month_year);
        return $carbon->monthName;
    }

    function employee(){
        return $this->belongsTo(User::class,'user_id');
    }






}
