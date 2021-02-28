<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiCollectionsController extends Controller
{
    //

    private $token = '12345abcde';

    function getAuthToken(){
        return [
            'token'=>$this->token
        ];
    }

    private function notAuthorized(){
      return request('token') !== $this->token;
    }

    function fetchUsers(){

        if ($this->notAuthorized()){
            return [
                'message'=>'Not authorized!',
                'error'=>true
            ];
        }

       return [
           'users'=>User::fetchV2()->get(),
           'token'=>request('token')
       ];
    }



    function getUser($email){

        if ($this->notAuthorized()){
            return [
                'message'=>'Not authorized!',
                'error'=>true
            ];
        }


        if (!User::fetchV2()->where('email',$email)->exists()){
             return [
                 'message'=>'User does not exist!',
                 'error'=>true,
                 'user'=>null
             ];
         }

         $user = User::fetchV2()->where('email',$email)->first();

         return [
             'user'=>$user,
             'token'=>request('token')
         ];

    }

    function convertJsonToB64(){

        if ($this->notAuthorized()){
            return [
                'message'=>'Not authorized!',
                'error'=>true
            ];
        }


        $json = request('json');
        $b64 = base64_encode($json);
        return [
            'encoded'=>$b64,
            'token'=>\request('token')
        ];
    }

    function convertb64ToCsv($b64){

        if ($this->notAuthorized()){
            return [
                'message'=>'Not authorized!',
                'error'=>true
            ];
        }


        $json = base64_decode($b64);
        $json = json_decode($json,true);

//        return $json;

        $r = [];
        foreach ($json['user'] as $k=>$v){
            $r[] = $k . ':' . $v;
        }

        return [
            'csv'=>implode(',',$r),
            'token'=>\request('token')
        ];


    }




}
