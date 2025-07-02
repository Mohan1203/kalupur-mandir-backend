<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ParsadiDarshan;
use App\Models\Yajman;
use App\Models\Testimonials;
use App\Models\Setting;
use App\Models\EventGallery;
use App\Models\PhotoGallery;
use App\Models\SubPhotoGallery;

class ApiController extends Controller
{
    public function getHomeData(){
        try{
        $testimonials = Testimonials::all();
        $prasadidarshan = ParsadiDarshan::all();

        $setting = Setting::first();
        $main_video = $setting ? $setting->home_video_link	 : null;
        $prasadidarshan->map(function ($item){
            $item->prasadi_image = asset(env('APP_URL').'/' . $item->prasadi_image);
        });
        $data = [
            'success' => true,
            'data'=>[
                'prasadidarshan' => $prasadidarshan,
                'testimonials' => $testimonials,
                'main_video' => $main_video
            ]
        ];
        return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }


    }

    public function getYajmanData(){
        try{
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $yajmans = Yajman::orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $yajmans->map(function ($item){
                $item->image = asset(env('APP_URL').'/' . $item->image_path);
                unset($item->image_path);
                return $item;
            });

            $data = [
                'success' => true,
                'data' => $yajmans
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getTestimonials(){
        try{
            $testimonials = Testimonials::orderBy('created_at', 'desc')->get();
            $date = [
                'success' => true,
                'data' => $testimonials
            ];
            return response()->json($date);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getEventGallery(){
        try{
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $eventGallery = EventGallery::orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $eventGallery->map(function ($item){
                $item->image = asset(env('APP_URL').'/' . $item->image_path);
                unset($item->image_path);
                return $item;
            });
            $data = [
                'success' => true,
                'data' => $eventGallery
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getPhotoGallery(){
        try{
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $photoGallery = PhotoGallery::orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $photoGallery->map(function ($item){
                $item->image = asset(env('APP_URL').'/' . $item->image);
                return $item;
            });
            $data = [
                'success' => true,
                'data' => $photoGallery
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

    public function getSubPhotoGallery(string $id){
        try{
            $limit = $request->limit ?? 6;
            $offset = $request->offset ?? 0;
            $subPhotoGallery = SubPhotoGallery::where('photo_id', $id)
                ->orderBy('created_at', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();
            $subPhotoGallery->map(function ($item){
                $item->image = asset(env('APP_URL').'/' . $item->image);
                return $item;
            });
            $data = [
                'success' => true,
                'data' => $subPhotoGallery
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'error' => 'An error occurred while fetching data.',
                'message' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }

}
