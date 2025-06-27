<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AcharyaController;
use App\Http\Controllers\PhotogalleryController;

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('handle.authenticate');

Route::group(['middleware'=>['auth']],function(){
    // Home Routes
    Route::get("/",[HomeController::class,'index']);
    Route::post("/",[HomeController::class,'store'])->name('handle.addhomepagedata');
    // Booking Routes
    Route::get("/bookings",[BookingController::class,'index']);
    Route::post("/bookings",[BookingController::class,'store'])->name('handle.saveBookingdetail');
    // Acharya Routes
    Route::get("/acharya",[AcharyaController::class,'index']);
    Route::post("/acharya",[AcharyaController::class,'store'])->name('handle.saveAcharya');
    Route::get("/editacharya/{id}",[AcharyaController::class,'edit']);
    Route::put("/editacharya/{id}",[AcharyaController::class,'update'])->name('handle.updateAcharya');
    Route::delete("/acharya/{id}",[AcharyaController::class,'destroy'])->name("handle.deleteAcharya");
    // Photo Gallery Routes
    Route::get("/photogallery",[PhotogalleryController::class,'index']);
    Route::post("/photogallery",[PhotogalleryController::class,'store'])->name('handle.savephotos');

    // Sub Photo Gallery Routes
    Route::post("/subphotos",[PhotogalleryController::class,'storeSubPhotos'])->name('handle.savesubphotos');
});


