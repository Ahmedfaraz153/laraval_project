<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomValidationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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
    return view('welcome');
});

Route::get('validations',[CustomValidationController::class,'custom_validation']);
Route::get('register',[RegisterController::class,'showRegistrationForm']);
Route::post('register', [RegisterController::class,'register']);

Route::get('login',[LoginController::class,'showloginForm']);
Route::post('login', [LoginController::class,'login']);
Route::get('logout', [LoginController::class,'logout']);

