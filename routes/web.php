<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\Spots;
use App\Http\Controllers\trips;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomePage::class,'imageAndDescription'])->middleware('islogout');

Route::get('/login',[AuthController::class,'login'])->middleware('islogout');
Route::post('login-user',[AuthController::class,'loginUser'])->name('login-user');

Route::get("/register",[AuthController::class,'register'])->middleware('islogout');
Route::post("/register-user",[AuthController::class,'registerUser']) -> name('register-user');

Route::get("/dashboard",[AuthController::class,'dashboard'])->middleware('isLoggedIn');

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/spots',[Spots::class,'spot_page'])->middleware('isLoggedIn');
Route::get('spot-pop/{id}',[Spots::class,'popUp'])->name('spot-up');;


Route::get('/trips',[trips::class,'trip_plan']);