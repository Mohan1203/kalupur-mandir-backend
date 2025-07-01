<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrasadidarshanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AcharyaController;
use App\Http\Controllers\PhotogalleryController;
use App\Http\Controllers\EventGalleryController;
use App\Http\Controllers\AboutuseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('handle.authenticate');

Route::group(['middleware'=>['auth']],function(){

    // Home Routes
    Route::get("/",[HomeController::class,'index']);
    Route::post("/",[HomeController::class,'store'])->name('handle.addhomepagedata');

    // Parsadi darshan Routes
    Route::get("/parsadidarshan",[HomeController::class,'getPrasadiDarshan']);
    Route::post("/prasadidarshan",[HomeController::class,'storePrasadiDarshan'])->name('handle.savePrasadidarshan');
    Route::get("/editprasadidarshan/{id}",[HomeController::class,'editPrasadiDarshan'])->name('handle.editPrasadiDarshan');
    Route::put("/updateprasadidarshan/{id}",[HomeController::class,'updatePrasadiDarshan'])->name('handle.updatePrasadiDarshan');
    Route::delete("/deleteprasadidarshan/{id}",[HomeController::class,'destroyPrasadiDarshan'])->name('handle.deletePrasadiDarshan');


    // Testimonial Routes
    Route::get("/testimonials",[TestimonialController::class,'index']);
    Route::post("/testimonials",[TestimonialController::class,'store'])->name('handle.saveTestimonial');
    Route::get('/edittestimonials/{id}',[TestimonialController::class,'edit'])->name('handle.editTestimonial');
    Route::put("/updatetestimonial/{id}",[TestimonialController::class,'update'])->name('handle.updateTestimonial');
    Route::delete("/testimonial/{id}",[TestimonialController::class,'destroy'])->name("handle.deleteTestimonial");

    // Booking Routes
    Route::get("/bookings",[BookingController::class,'index']);
    Route::post("/bookings",[BookingController::class,'store'])->name('handle.saveBookingdetail');

    // Acharya Routes
    Route::get("/acharya",[AcharyaController::class,'index']);
    Route::post("/acharya",[AcharyaController::class,'store'])->name('handle.saveAcharya');
    Route::get("/editacharya/{id}",[AcharyaController::class,'edit']);
    Route::put("/editacharya/{id}",[AcharyaController::class,'update'])->name('handle.updateAcharya');
    Route::delete("/acharya/{id}",[AcharyaController::class,'destroy'])->name("handle.deleteAcharya");


    // Event Gallery Routes
    Route::get("/eventgallery",[EventGalleryController::class,'index']);
    Route::post('/eventgallery',[EventGalleryController::class,'store'])->name('handle.saveEventGallery');
    Route::get('/editeventgallery/{id}',[EventGalleryController::class,'edit'])->name('handle.editEventGallery');
    Route::put('/updateeventgallery/{id}',[EventGalleryController::class,'update'])->name('handle.updateEventGallery');
    Route::delete('/eventgallery/{id}',[EventGalleryController::class,'destroy'])->name('handle.deleteEventGallery');
    Route::post('/savesubphotos',[EventGalleryController::class,'storeSubEventPhotos'])->name('handle.saveEventSubPhotos');

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

    Route::post("/logout",[LoginController::class,'logout'])->name('handle.logout');
});


Route::get('migrate', static function () {
    Artisan::call('migrate');
//    return redirect()->back();
    echo "Done";
    return false;
});

Route::get('admin-seeders', static function () {
    Artisan::call('db:seed --class=AdminSeeder');
    echo "Done";
    return false;
});

Route::get('migrate-rollback', static function () {
    Artisan::call('migrate:rollback');
    echo "Done";
    return false;
});




