<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;



Route::get('/home', [ApiController::class, 'getHomeData']);
Route::get('/yajman', [ApiController::class, 'getYajmanData']);
Route::get('/testimonials', [ApiController::class, 'getTestimonials']);
Route::get('/get_event_gallery',[ApiController::class, 'getEventGallery']);
Route::get('/get_event_gallery/{slug}', [ApiController::class, 'getSubEventGallery']);
Route::get('/photo_gallery', [ApiController::class, 'getPhotoGallery']);
Route::get('photo_gallery/{slug}', [ApiController::class, 'getSubPhotoGallery']);


// get acharyas
Route::get('/acharyas-list', [ApiController::class, 'getAcharyas']);

Route::post('/contact_us', [ApiController::class, 'contactUs']);
Route::post('/donation', [ApiController::class, 'donation']);
