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

    public function getPrasadiDarshan()
    {
        $prasadiDarshans = ParsadiDarshan::all();
        return view('admin.home.prasadidarshan', compact('prasadiDarshans'));
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

    

    return redirect()->back()->with('success', 'Saved successfully!');
}

public function storePrasadiDarshan(Request $request){
    $prasadi = new ParsadiDarshan();
    $prasadi->title = $request->heading;
    $prasadi->description = $request->description ?? '';

    if ($request->hasFile("prasadi_image")) {
            $imageName ='prasadi_image' . time() . '.' . $request->prasadi_image->extension();
            $request->prasadi_image->move(public_path("images"), $imageName);
            $prasadi->prasadi_image = 'images/' . $imageName;
    }
    $prasadi->save();
    return redirect()->back()->with('success', 'Saved successfully!');
}

    public function editPrasadiDarshan(string $id)
    {
        $prasadiDarshan = ParsadiDarshan::where('id',$id)->first();
        return view('admin.home.editprasadidarshan', compact('prasadiDarshan'));
    }

    public function updatePrasadiDarshan(Request $request, string $id)
    {
        $prasadiDarshan = ParsadiDarshan::where('id',$id)->first();
        $prasadiDarshan->title = $request->heading;
        $prasadiDarshan->description = $request->description ?? '';

        if ($request->hasFile("prasadi_image")) {
            if ($prasadiDarshan->prasadi_image && file_exists(public_path($prasadiDarshan->prasadi_image))) {
                unlink(public_path($prasadiDarshan->prasadi_image));
            }
            $imageName ='prasadi_image' . time() . '.' . $request->prasadi_image->extension();
            $request->prasadi_image->move(public_path("images"), $imageName);
            $prasadiDarshan->prasadi_image = 'images/' . $imageName;
        }
        $prasadiDarshan->save();
        return redirect('/parsadidarshan')->with('success', 'Updated successfully!');
    }


    public function destroyPrasadiDarshan(string $id){
        ParsadiDarshan::destroy($id);
        return redirect()->back()->with('success', 'Deleted successfully!');
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
