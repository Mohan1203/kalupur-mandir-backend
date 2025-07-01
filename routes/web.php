<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AcharyaController;
use App\Http\Controllers\PhotogalleryController;
use App\Http\Controllers\AboutuseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingController;

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
    Route::get("/editphotogallery/{id}",[PhotogalleryController::class,'edit']);
    Route::put("/editphotogallery/{id}",[PhotogalleryController::class,'update'])->name('handle.updatephotogallery');
    Route::delete("/photogallery/{id}",[PhotogalleryController::class,'destroy'])->name("handle.deletephotogallery");

    // Sub Photo Gallery Routes
    Route::post("/subphotos",[PhotogalleryController::class,'storeSubPhotos'])->name('handle.savesubphotos');
    Route::get("/editsubphotogallery/{id}",[PhotogalleryController::class,'editSubPhoto']);
    Route::delete("/subphotogallery/{id}",[PhotogalleryController::class,'destroySubPhoto'])->name("handle.deletesubphotogallery");

    // About Us Routes
    Route::get("/aboutus",[AboutuseController::class,'index']);
    Route::post("/aboutus",[AboutuseController::class,'store'])->name('handle.saveAboutus');
    Route::get('/edittimerange/{id}',[AboutuseController::class,'editTimerange'])->name('handle.editTimerange');
    Route::put("/updatetimerange/{id}",[AboutuseController::class,'updateTimerange'])->name('handle.updateTimerange');
    Route::delete("/timerange/{id}",[AboutuseController::class,'destroyTimerange'])->name("handle.deleteTimerange");

    Route::post('/address',[AboutuseController::class,'storeAddress'])->name('handle.saveAddress');

    // Pages Routes
    Route::get("/pages",[PagesController::class,'index'])->name('pages.index');
    Route::post("/pages",[PagesController::class,'store'])->name('handle.savePages');

    // Settings Routes
    Route::get("/settings",[SettingController::class,'index'])->name('settings.index');
    Route::post("/settings",[SettingController::class,'store'])->name('handle.saveSettings');



});


