<?php


namespace App\Traits;


trait RedirectHelper
{



    function respondBack($response){
        return redirect()->back()->with($response);
    }


}