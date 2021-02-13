<?php


namespace App\Services;


use App\Models\Payroll;
use App\Models\User;
use Carbon\Carbon;

class PayrollService
{
    private $users = [];
//    private $usersBasicSalary = [];
//    private $usersDeductions = [];
//    private $usersAllowances = [];
//    private $usersNetPay = [];
    private $numberOfDays = 0;

    function runPayroll(){
        try {
            $this->getUsers();
            $this->getNumberOfDaysFromMonth(request('month_year'));
            $this->getUsersBasicSalary();
            $this->getUsersDeductions();
            $this->getUsersAllowance();
            $this->computeUsersNetPay();

            return [
                'message'=>'Payroll ran.',
                'error'=>false
            ];
        }catch (\Exception $exception){
            return  [
                'message'=>$exception->getMessage(),
                'error'=>true
            ];
        }

    }

    function getUsers(){
       $users = User::all();
       $this->users = collect($users);
    }

    function getNumberOfDaysFromMonth($month=''){
        if (empty($month)){
            throw new \Exception("Month is required to run payroll!");
        }
        $carbon = Carbon::create($month);
        $days = $carbon->daysInMonth;
        $this->numberOfDays = $days;
    }

    function getUsersBasicSalary(){
      $this->users = $this->users->map(function(User $user){
          return [
              'user'=>$user,
              'basic_salary'=>$user->getDailyBasicSalary()
          ];
      });

//     dd($this->users);
    }

    function getUsersDeductions(){

        $this->users = $this->users->map(function($item){
            return [
                'user'=>$item['user'],
                'basic_salary'=>$item['basic_salary'],
                'deductions'=>$item['user']->getDailyDeductions()
            ];
        });

    }

    function getUsersAllowance(){

        $this->users = $this->users->map(function($item){
            return [
                'user'=>$item['user'],
                'basic_salary'=>$item['basic_salary'],
                'deductions'=>$item['deductions'],
                'allowances'=>$item['user']->getDailyAllowance()
            ];
        });

//        dd($this->users);
    }

    function computeUsersNetPay(){

//        if (Payroll::isRan(request('month_year'))){
//            throw new \Exception('Payroll already ran for the month ' . request('month_year'));
//        }

        $this->users = $this->users->map(function($item){
            return [
                'month_year'=>request('month_year'),
                'user_id'=>$item['user']->id,
                'basic_salary'=>$item['basic_salary'] * $this->numberOfDays,
                'deductions'=>$item['deductions'] * $this->numberOfDays,
                'allowances'=>$item['allowances'] * $this->numberOfDays,
                'gross_pay'=>($item['basic_salary'] + $item['allowances']) * $this->numberOfDays,
                'net_pay'=>($item['basic_salary'] + $item['allowances'] - $item['deductions']) * $this->numberOfDays
            ];
        });

        $this->users->each(function($item){

            (new Payroll)->savePayroll($item);

        });

    }



}