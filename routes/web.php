<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\GradePayrollComponentController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.login');
})->middleware(['guest']);


Route::get('reset-all-password',function(){
    $list = User::all();
    $list = collect($list);
    $list->each(function($item){
        $item->password = crypt('admin',env('APP_KEY')); // \Illuminate\Support\Facades\Hash::make('admin');
        $item->save();
    });
//    dd($list);
    return [
        'message'=>'All passwords has been reset.',
        'error'=>false
    ];
});


Route::get('home',function(){
    return redirect(route('dashboard'));
});


Route::get('login',function(){
//    dd(123);
    return view('user.login');
})->name('login');



Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::post('change-password/{user}',[UserController::class,'changePassword'])->middleware(['auth'])->name('change.password');
Route::post('update-profile/{user}',[UserController::class,'updateProfile'])->middleware(['auth'])->name('update.profile');
Route::post('login',[UserController::class,'userLogin'])->name('login');
Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware(['auth']);

Route::get('migrate',function(){

    (new User)->createDefaultAccount();

});

Route::resource('user',UserController::class)->middleware(['auth','ownership:admin']);
Route::resource('grade',\App\Http\Controllers\GradeController::class)->middleware(['auth','ownership:admin']);
Route::resource('payroll_component',\App\Http\Controllers\PayrollComponentController::class)->middleware(['auth']);
Route::resource('grade_payroll_component',GradePayrollComponentController::class)->middleware(['auth']);

Route::prefix('payroll')->group(function(){

    Route::resource('hr',\App\Http\Controllers\PayrollController::class)->middleware(['auth']);

    Route::post('run-payroll',[\App\Http\Controllers\PayrollController::class,'runPayroll'])->name('run.payroll')->middleware(['auth']);

});

//Route::get('expenditure-export',[ExpenditureController::class,'export'])->name('expenditure.export');
