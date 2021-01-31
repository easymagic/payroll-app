<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

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

        $confirmedCost = Expenditure::confirmedExpenditure()->sum('cost');
        $pendingCost = Expenditure::pendingExpenditure()->sum('cost');

        $totalExpenditureCost = Expenditure::sum('cost');

       return view('user.dashboard',compact(['userCount','confirmedCost','pendingCost','totalExpenditureCost']));

    }


}
