<?php

use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\hotels;
use App\Http\Controllers\Spots;
use App\Http\Controllers\trips;
use App\Http\Controllers\package;

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
Route::get('spot_pop/{id}',[Spots::class,'spot_pop'])->name('spot_pop');
Route::post('add_comment/',[Spots::class,'add_comment'])->name('add_comment');
Route::get('view_comment/{id}',[Spots::class,'view_comment'])->name('view_comment');



Route::get('/hotels',[hotels::class,'hotel_page'])->middleware('isLoggedIn');
Route::get('map_pop/{id}',[hotels::class,'map_pop'])->name('map_pop');
Route::get('view_comment_hotel/{id}',[hotels::class,'view_comment_hotel'])->name('view_comment_hotel');
Route::post('add_comment_hotel/',[hotels::class,'add_comment_hotel'])->name('add_comment_hotel');


Route::get('/trips',[trips::class,'trip_plan'])->name('trips')->middleware('isLoggedIn');
Route::post('/getspot',[trips::class,'spot'])->name('getspot');
Route::post('/gettransportType',[trips::class,'transportType'])->name('gettransportType');
Route::post('/gethotel',[trips::class,'hotel'])->name('hotel');
Route::post('/confirm',[trips::class,'saveData'])->name('confirm');
Route::post('/delete',[trips::class,'destroy'])->name('delete');
Route::get('/gettabledata',[trips::class,'tabledata'])->name('gettabledata');


Route::get('/package',[package::class,'packages'])->name('package')->middleware('isLoggedIn');
Route::post('/confirm_pack/{id}',[package::class,'saveData'])->name('confirm_pack');
Route::get('/payment/{id}',[package::class,'payment'])->name('payment');
Route::post('/transaction',[package::class,'transaction'])->name('transaction');


Route::get('/adminDashboard',[admin::class,'loginAdmin'])->middleware('isLoggedIn');
Route::post('delete_user_admin/{id}',[admin::class,'delete_user'])->name('delete_user_admin');
Route::post('/update_user',[admin::class,'update_user'])->name('update_user');


Route::get('/adminPackage',[admin::class,'package'])->middleware('isLoggedIn');
Route::post('delete_pac_admin/{id}',[admin::class,'destroy_package'])->name('delete_pac_admin');
Route::post('/add_pac_admin',[admin::class,'add_package'])->name('add_pac_admin');

Route::get('/adminSpots',[admin::class,'spots'])->middleware('isLoggedIn');
Route::get('/adminHotel',[admin::class,'hotel'])->middleware('isLoggedIn');






