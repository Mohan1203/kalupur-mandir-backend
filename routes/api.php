<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;


Route::get('/home', [ApiController::class, 'getHomeData']);
Route::get('/yajman', [ApiController::class, 'getYajmanData']);
Route::get('/testimonials', [ApiController::class, 'getTestimonials']);
Route::get('/get_event_gallery',[ApiController::class, 'getEventGallery']);
Route::get('/photo_gallery', [ApiController::class, 'getPhotoGallery']);
Route::get('photo_gallery/{id}', [ApiController::class, 'getSubPhotoGallery']);
