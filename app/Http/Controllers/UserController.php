<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    function index(){

        $list = User::allUsers()->get();

        return view('user.index',compact(['list']));
    }

    function userLogin(){

        $check = (new User)->login();

//        dd('check');

        if ($check){
           return redirect()->route('dashboard')->with([
               'message'=>'Welcome To Expenditure Management',
               'error'=>false
           ]);
        }


        return redirect()->back()->with([
            'message'=>'Invalid login!',
            'error'=>true
        ]);

    }

    function logout(){

        (new User)->logout();

        return redirect()->route('login')->with([
            'message'=>'Just logged out',
            'error'=>false
        ]);
    }


    function updateProfile(User $user){
      $data = $user->updateProfile();
      return redirect()->back()->with([
          'message'=>'Profile Saved.',
          'data'=>$data
      ]);
    }

    function changePassword(User $user){
        $response = $user->changePassword();
        return redirect()->back()->with($response);
    }


    function dashboard(){

        $userCount = User::count();

        $payrollRanThisMonth = Payroll::thisMonth()->sum('net_pay');
        $payrollTotal = Payroll::total()->sum('net_pay');


       return view('user.dashboard',compact(['userCount','payrollRanThisMonth','payrollTotal']));

    }

    function store(){
        $response = (new User)->createUser();
        return redirect()->back()->with($response);
    }

    function update(User $user){
        $response = $user->updateUser();
        return redirect()->back()->with($response);
    }


}
