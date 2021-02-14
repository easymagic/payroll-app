<?php


namespace App\Policies;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait OwnershipPolicy
{
    static function checkNonAdmin(Builder $builder,$field){
        $userId = Auth::user()->id;
        $type = Auth::user()->type;
        if ($type != 'admin'){
            $builder = $builder->where($field,$userId);
        }

        return $builder;
    }



}