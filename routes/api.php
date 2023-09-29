<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\ApiRegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

   
});

Route::get('user_data_get',[ApiController::class,'getuser']);
Route::post('user_data_post',[ApiController::class,'user_store']);
Route::get('user_data_edit/{id}',[ApiController::class,'user_edit']);
Route::post('user_data_update/{id}',[ApiController::class,'user_update']);
Route::get('user_data_destroy/{id}',[ApiController::class,'user_destroy']);

Route::Post('loginuser',[UserLoginController::class,'loginuser']);


Route::Post('registerusers',[ApiRegisterController::class,'registeruser']);

