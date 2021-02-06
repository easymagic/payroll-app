<?php

namespace App\Traits;

trait RequestGrab
{

    function take($name){
        if (request()->filled($name)){
            $this->$name = request($name);
        }
    }
}