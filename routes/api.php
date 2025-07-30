<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;


Route::get('/settings', [ApiController::class, 'getSettings']);
Route::get('/home', [ApiController::class, 'getHomeData']);
Route::get('/yajman', [ApiController::class, 'getYajmanData']);
Route::get('/testimonials', [ApiController::class, 'getTestimonials']);
Route::get('/get_event_gallery',[ApiController::class, 'getEventGallery']);
Route::get('/get_event_gallery/{slug}', [ApiController::class, 'getSubEventGallery']);
Route::get('/photo_gallery', [ApiController::class, 'getPhotoGallery']);
Route::get('/videos',[ApiController::class,'getVideos']);
Route::get('/playlists',[ApiController::class,'getPlaylists']);
Route::get('photo_gallery/{slug}', [ApiController::class, 'getSubPhotoGallery']);
Route::get('/get_booking_info', [ApiController::class, 'getBooking']);
Route::get('/get_timings', [ApiController::class, 'getTimings']);

// get acharyas
Route::get('/acharyas-list', [ApiController::class, 'getAcharyas']);

Route::get('/get_seo',[ApiController::class,'getSeoSetting']);

Route::post('/contact_us', [ApiController::class, 'contactUs']);
Route::post('/donation', [ApiController::class, 'donation']);
Route::post('/pooja-booking',[ApiController::class,'bookingDetails']);
