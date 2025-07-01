<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ParsadiDarshan;
use App\Models\Testimonials;
use App\Models\Setting;

class ApiController extends Controller
{
    public function getHomeData(){
        try{
        $testimonials = Testimonials::all();
        $prasadidarshan = ParsadiDarshan::all();

        $setting = Setting::first();
        $prasadidarshan->map(function ($item){
            $item->prasadi_image = asset(env('APP_URL').'/' . $item->prasadi_image);
        });
        $data = [
            'success' => true,
            'data'=>[
                'prasadidarshan' => $prasadidarshan,
                'testimonials' => $testimonials,
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
}
