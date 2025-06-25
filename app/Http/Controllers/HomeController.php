<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\ParsadiDarshan;
use App\Models\Testimonials;

use Illuminate\Http\Request;

class HomeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.home.home',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Save the video link
       $setting = Setting::first() ?? new Setting();

    if ($request->hasFile('pooja_image')) {
        if ($setting->mahapuja_image && file_exists(public_path($setting->mahapuja_image))) {
            unlink(public_path($setting->mahapuja_image));
        }
            $imageName = 'mahapuja_image_' . time() . '.' . $request->pooja_image->extension();
            $request->pooja_image->move(public_path("images"), $imageName);
            $setting->mahapuja_image = 'images/' . $imageName;
    }

    if($request->hasFile('yagna_image')){
        if ($setting->yagna_image && file_exists(public_path($setting->yagna_image))) {
            unlink(public_path($setting->yagna_image));
        }
            $imageName = 'yagna_image' . time() . '.' . $request->yagna_image->extension();
            $request->yagna_image->move(public_path("images"), $imageName);
            $setting->yagna_image = 'images/' . $imageName;
    }
    $setting->home_video_link = $request->video_link;
    $setting->save();

    // Save Prasadi Darshan entries

    if (!empty($request->heading) && count(array_filter($request->heading)) > 0) {
        foreach ($request->heading as $index => $heading) {
            $prasadi = new ParsadiDarshan();
            $prasadi->title = $heading;
            $prasadi->description = $request->description[$index] ?? '';

            // Handle file upload
            if ($request->hasFile("prasadi_image.$index")) {
                $file = $request->file("prasadi_image")[$index];
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('prasadi_images', $filename, 'public');
                $prasadi->prasadi_image = $path;
            }

            $prasadi->save();
        }
    }

    if(!empty($request->heading) && count(array_filter($request->heading)) > 0){
        foreach($request->testimonail_name as $index => $testimonail_name){
            $testimonials = new Testimonials();
            $testimonials->name = $testimonail_name;
            $testimonials->country = $request->testimonail_country[$index] ?? "";
            $testimonials->description = $request->testimonail_description[$index] ?? "";
            $testimonials->save();
        }
    }

    return redirect()->back()->with('success', 'Saved successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
