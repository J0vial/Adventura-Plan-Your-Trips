<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('homePage');
});
Route::get('/login',[AuthController::class,'login']);
Route::post('login-user',[AuthController::class,'loginUser'])->name('login-user');

Route::get("/register",[AuthController::class,'register']);
Route::post("/register-user",[AuthController::class,'registerUser']) -> name('register-user');

Route::get("/dashboard",[AuthController::class,'dashboard'])->middleware('isLoggedIn');

Route::get('/logout',[AuthController::class,'logout']);