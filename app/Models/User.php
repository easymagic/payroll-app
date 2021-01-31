<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    function login(){

//        dd('login');

        $email = request('email');
        $password = request('password');

        $check = Auth::attempt([
            'email'=>$email,
            'password'=>$password
        ]);


        return $check;


    }

    function logout(){
        Auth::logout();
    }

    function updateProfile(){

      $this->name = request('name');
      $this->phone = request('phone');

      $this->save();

      return $this;

    }

    function changePassword(){

        $password_old = request('password_old');
        $password_new = request('password_new');
        $password_confirm = request('password_confirm');

        $existingPassword = $this->password;

        if (!Hash::check($password_old,$existingPassword)){
            return [
                'message'=>'Old password is incorrect!',
                'error'=>true
            ];
        }


        if ($password_new == $password_confirm && !empty($password_confirm)){

           $this->password = Hash::make($password_confirm);
           $this->save();

            return [
                'message'=>'Password changed successfully.',
                'error'=>false
            ];

        }

        return [
            'message'=>'Old password is incorrect!',
            'error'=>true
        ];

    }


    function createDefaultAccount(){
        $email = 'admin@domain.com';
        if (User::where('email',$email)->exists()){
           return;
        }
        $this->email = $email;
        $this->password = Hash::make('admin');
        $this->name = 'Admin';
        $this->phone = '08029292929';
        $this->status = 1;
        $this->save();
        return $this;
    }


    function scopeAllUsers(Builder $builder){
        return $builder;
    }

    function getStatusNameAttribute(){
        if ($this->status == 1){
            return 'Active';
        }
        return 'In-Active';
    }


    function activateUser(){
        $this->status = 1;
        $this->save();
    }

    function deactivateUser(){
        $this->status = 0;
        $this->save();
    }

    function scopeAccountExists(Builder $builder,$email){
        return $builder->where('email',$email)->exists();
    }



    function createUser(){

        if ($this->accountExists(request('email'))){
            return [
                'message'=>'An account with this email already exists!',
                'error'=>true
            ];
        }

        if (!request()->filled('grade_id')){
            return [
                'message'=>'Grade is required!',
                'error'=>true
            ];
        }

        $this->email = request('email');
        $this->name = request('name');
        $this->phone = request('phone');
        $this->grade_id = request('grade_id');
        $this->password = Hash::make('password123');

        $this->save();

        return [
            'message'=>'User account created successfully.',
            'error'=>false
        ];
    }

    function updateUser(){
//        $this->email = request('email');
        $this->name = request('name');
        $this->phone = request('phone');
        $this->grade_id = request('grade_id');
//        $this->password = Hash::make('password123');
        $this->save();

        return [
            'message'=>'User account updated successfully.',
            'error'=>false
        ];
    }

}
