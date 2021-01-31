<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function expenditure(){
        return $this->hasMany(Expenditure::class,'category_id');
    }

    function createCategory(){
      $this->name = request('name');
      $this->save();
      return $this;
    }

    function updateCategory(){
        $this->name = request('name');
        $this->save();
        return $this;
    }

    function isCategoryLinked(){
        return $this->whereHas('expenditure',function(Builder $builder){
            return $builder;
        })->exists();
    }


}
