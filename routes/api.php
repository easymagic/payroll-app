<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('authorize',[\App\Http\Controllers\ApiCollectionsController::class,'getAuthToken']);

Route::get('users',[\App\Http\Controllers\ApiCollectionsController::class,'fetchUsers']);

Route::get('get-user/{email}',[\App\Http\Controllers\ApiCollectionsController::class,'getUser']);
//send json as json-string
Route::post('json-b64',[\App\Http\Controllers\ApiCollectionsController::class,'convertJsonToB64']);
Route::get('b64-csv/{b64}',[\App\Http\Controllers\ApiCollectionsController::class,'convertb64ToCsv']);

