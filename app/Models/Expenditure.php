<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    function scopeConfirmedExpenditure(Builder $builder){
        return $builder->where('status',1);
    }



    function scopePendingExpenditure(Builder $builder){
        return $builder->where('status',0);
    }

    function scopeFetch(Builder $builder){




        return $builder;

    }

    function createExpenditure(){
        $this->category_id = request('category_id');
        $this->item = request('item');
        $this->cost = request('cost');
        $this->save();
        return $this;
    }

    function updateExependiture(){
        $this->category_id = request('category_id');
        $this->item = request('item');
        $this->cost = request('cost');
        $this->save();
        return $this;
    }

    function getStatusNameAttribute(){
        if ($this->status == 1){
            return 'Active';
        }
        return 'In-Active';
    }


    function activate(){
       $this->status = 1;
       $this->save();
       return $this;
    }

    function deactivate(){
        $this->status = 0;
        $this->save();
        return $this;
    }

    function isExpenditureAcive(){
        return ($this->status == 1);
    }

    function isExpenditureOverTime(){
        $created_at = $this->created_at;
        $carbon = Carbon::now();
        $value = $carbon->diffInMinutes($created_at);
        return ($value > 2);
    }


}
