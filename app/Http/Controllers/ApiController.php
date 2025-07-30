<?php

namespace App\Http\Controllers;

use App\Models\EventGallery;
use App\Models\EventSubGallery;
use App\Models\ParsadiDarshan;
use App\Models\PhotoGallery;
use App\Models\Setting;
use App\Models\SubPhotoGallery;
use App\Models\Testimonials;
use App\Models\Yajman;
use App\Models\Booking;
use App\Models\Donations;
use App\Models\Acharya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\youtubeservice;
use App\Models\Aboutus;
use App\Models\SeoDetails;
use App\Models\PoojaBooking;

class ApiController extends Controller
{
    public function getHomeData()
    {
        try {
            $testimonials = Testimonials::all();
            $prasadidarshan = ParsadiDarshan::all();

            $setting = Setting::first();
            $main_video = $setting ? $setting->home_video_link : null;
            $prasadidarshan->map(function ($item) {
                $item->prasadi_image = asset(env('APP_URL') . '/' . $item->prasadi_image);
            });
            $data = [
                'success' => true,
                'data' => [
                    'prasadidarshan' => $prasadidarshan,
                    'testimonials' => $testimonials,
                    'main_video' => $main_video
                ]
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getYajmanData()
    {
        try {
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $yajmans = Yajman::orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $yajmans->map(function ($item) {
                $item->image = asset(env('APP_URL') . '/' . $item->image_path);
                unset($item->image_path);
                return $item;
            });

            $data = [
                'success' => true,
                'data' => $yajmans
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getTestimonials()
    {
        try {
            $testimonials = Testimonials::orderBy('created_at', 'desc')->get();
            $date = [
                'success' => true,
                'data' => $testimonials
            ];
            return response()->json($date);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getEventGallery()
    {
        try {
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $eventGallery = EventGallery::orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $eventGallery->map(function ($item) {
                $item->image = asset(env('APP_URL') . '/' . $item->image_path);
                unset($item->image_path);
                return $item;
            });
            $data = [
                'success' => true,
                'data' => $eventGallery
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getSubEventGallery(string $slug)
    {
        try {
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $eventGallery = EventGallery::where('slug', $slug)->first();
            if (!$eventGallery) {
                return response()->json(['success' => false, 'error' => 'Event gallery not found.'], 404);
            }
            $subEventGallery = EventSubGallery::where('image_id', $eventGallery->id)
                ->orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $subEventGallery->map(function ($item) {
                $item->image = asset(env('APP_URL') . '/' . $item->image_path);
                unset($item->image_path);

                return $item;
            });
            $data = [
                'success' => true,
                'data' => $subEventGallery
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getPhotoGallery(Request $request)
    {
    try {
        $limit = $request->query('limit', 6);
        $offset = $request->query('offset', 0);

        $total = PhotoGallery::count();

        $photoGallery = PhotoGallery::orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        $photoGallery->transform(function ($item) {
            $item->image = asset($item->image);
            return $item;
        });

        return response()->json([
            'success' => true,
            'data' => $photoGallery,
            'total' => $total,
            'limit' => (int)$limit,
            'offset' => (int)$offset,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => 'An error occurred while fetching data.',
            'message' => $e->getMessage(),
        ]);
    }
}

    public function getSubPhotoGallery(string $slug)
    {
        try {
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $photoGallery = PhotoGallery::where('slug', $slug)->first();
            $subPhotoGallery = SubPhotoGallery::where('photo_id', $photoGallery->id)
                ->orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $subPhotoGallery->map(function ($item) {
                $item->image = asset(env('APP_URL') . '/' . $item->image);
                return $item;
            });
            $data = [
                'success' => true,
                'data' => $subPhotoGallery
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function contactUs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        try {
            return response()->json([
                'error' => false,
                'message' => 'Message sent successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function donation(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'amount' => 'required',
            'mandir' => 'required',
            'donation_type' => 'required|in:donation-to-trust-fund,mahapuja,mandir-nirman,yagna,dharmado',
        ]);

        if($validator->fails()){
            return response()->json(['error' => true, 'message' => $validator->errors()->first()], 422);
        }

        try{
            $donation = Donations::create($request->all());
            return response()->json(['error' => false, 'message' => 'Donation submitted successfully']);
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function getBooking(){
        try{

            $setting = Setting::first();
            $booking = Booking::first();

            $maha_pooja_image = $setting['mahapuja_image'] ? asset(env('APP_URL') . '/' . $setting['mahapuja_image']) : null;
            $yagna_image = $setting['yagna_image'] ? asset(env('APP_URL') . '/' . $setting['yagna_image']) : null;

            $pooja_description = $booking['pooja_description'] ?? '';
            $yagna_description = $booking['yagna_description'] ?? '';

            $maha_pooja = [
                'image' => $maha_pooja_image,
                'description' => $pooja_description
            ];
            $yagna = [
                'image' => $yagna_image,
                'description' => $yagna_description
            ];

            $data = [
                'success' => true,
                'data' => [
                    $maha_pooja,
                    $yagna
                ]
            ];
            return response()->json($data);

        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching booking data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getVideos(Request $request){
        try{
            $offset = $request->offset ?? 0;
            $limit = $request->limit ?? 10;
            $youtubeService = new YoutubeService();
            $videos = $youtubeService->getVideos($offset, $limit);
            $data = [
                'success' => true,
                'data' => $videos
            ];
            return response()->json($data);
        }catch(\Exception $e){
             $data = [
                'success' => false,
                'error' => 'An error occurred while fetching Videos data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getPlaylists(Request $request){
        try{
            $offset = $request->offset ?? 0;
            $limit = $request->limit ?? 10;
            $youtubeService = new YoutubeService();
            $videos = $youtubeService->getPlayLists($offset, $limit);
            $data = [
                'success' => true,
                'data' => $videos
            ];
            return response()->json($data);
        }catch(\Exception){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching playlist data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getAcharyas(Request $request){
        $limit = $request->limit ?? 10;
        $offset = $request->offset ?? 0;
        try{
            $acharyas = Acharya::orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $acharyas->map(function ($item) {
                $item->image = asset(env('APP_URL') . '/' . $item->image);
                return $item;
            });
            $data = [
                'error' => false,
                'data' => $acharyas,
                'total' => $acharyas->count()
            ];
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function getSettings(){
        try{
            $aboutus = Aboutus::all();
            $settings = Setting::first();

            $settings['our_timings'] = $aboutus;
            $settings['mahapuja_image'] = $settings['mahapuja_image'] ? asset(env('APP_URL') . '/' . $settings['mahapuja_image']) : null;
            $settings["yagna_image"] = $settings['yagna_image'] ? asset(env('APP_URL') . '/' . $settings['yagna_image']) : null;
            $data = [
                'error' => false,
                'data' => $settings,
            ];
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function getTimings(){
        try{
            $timings = Aboutus::all();
            $data = [
                'error' => false,
                'data' => $timings
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'error' => true,
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getSeoSetting(Request $request) {
        try{
            $page = $request->page;
            $pageData = SeoDetails::where('page_name',$page)->first();
             $data = [
                'error' => false,
                'data' => $pageData,
            ];
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function bookingDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'village' => 'required',
            'location' => 'required|in:domestic,international',
            'phone_number' => "required",
            'way_of_contact' => 'required',
            "date" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        try{

            $bookingDate = PoojaBooking::where('booking_date',$request->date)->first();

            if($bookingDate){
                $data = [
                    'error' => true,
                    'message' => "This date is already booked",
                ];
                return response()->json($data);
            }
                 $poojaBooking = PoojaBooking::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "village" => $request->village,
                "location" => $request->location,
                "phone_number" => $request->phone_number,
                "way_of_contact" => $request->way_of_contact,
                "booking_date" => $request->date
            ]);

            $data = [
                'error' => false,
                'message' => "Pooja details saved successfully",
            ];

            return response()->json($data);

        }catch(\Exception $e){
             $data = [
                'error' => true,
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }






    }

}
