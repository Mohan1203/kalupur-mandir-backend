<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\SubPhotoGallery;

class PhotogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = PhotoGallery::all();
        return view("admin.photogallery.photogallery",compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $validate = $request->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,webp,svg'
        ]);
        $galleryImage = new PhotoGallery();
        $galleryImage->title = $request->title;
        if($request->hasFile('image')){
            $imageName = 'mainPhoto'. time() . '.' .$request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $galleryImage->image = 'images/' . $imageName;
        }
        $galleryImage->save();
        return redirect()->back()->with('success','saved successfully');
        }catch(\Exception $e){
            dd($e->getMessage());
            return response()->json(['error' => 'An error occurred while store the image.'], 500);
        }

    }

    public function storeSubPhotos (Request $request){

        try{
             $validate = $request->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,webp,svg',
            'image_id' => 'required'
        ]);

        $subPhotoGallery = new SubPhotoGallery();

        $subPhotoGallery->title = $request->title;
        $subPhotoGallery->photo_id = $request->image_id;
        if($request->hasFile('image')){
            $imageName = 'subPhoto'. time() . '.' .$request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $subPhotoGallery->image = 'images/' . $imageName;
        }

        $subPhotoGallery->save();

        return redirect()->back()->with('success','saved successfully');

        }catch(\Exception $e){
            dd($e->getMessage());
            return response()->json(['error' => 'An error occurred while store the sub image.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
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
