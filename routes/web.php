<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('handle.authenticate');

Route::group(['middleware'=>['auth']],function(){

    Route::get("/",[HomeController::class,'index']);
    Route::post("/",[HomeController::class,'store'])->name('handle.addhomepagedata');
    Route::get("/bookings",[BookingController::class,'index']);
    Route::post("/bookings",[BookingController::class,'store'])->name('handle.saveBookingdetail');
});


