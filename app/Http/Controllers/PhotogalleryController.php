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
        $subImages = SubPhotoGallery::all();
        return view("admin.photogallery.photogallery",compact('images','subImages'));
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
        $validate = $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:photo_galleries,slug',
            'image'=>'required|image|mimes:jpg,png,jpeg,webp'
        ]);
        $galleryImage = new PhotoGallery();
        $galleryImage->title = $request->title;
        $galleryImage->slug = $request->slug;
        if($request->hasFile('image')){
            $imageName = 'mainPhoto'. time() . '.' .$request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $galleryImage->image = 'images/' . $imageName;
        }
        $galleryImage->save();
        return redirect()->back()->with('success','saved successfully');


    }

    public function storeSubPhotos (Request $request){

        try{
             $validate = $request->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,webp',
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
        return view('admin.photogallery.editphotogallery',[
            'image' => PhotoGallery::findOrFail($id)
        ]);
    }

    public function editSubPhoto(string $id)
    {
        return view('admin.photogallery.editsubphotogallery',[
            'image' => SubPhotoGallery::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $gallery_image = PhotoGallery::where('id',$id)->first();
            $gallery_image->title = $request->title;
            if($request->hasFile('image')){
                if ($gallery_image->image && file_exists(public_path($gallery_image->image))) {
                    unlink(public_path($gallery_image->image));
                }
                $imageName ='mainPhoto' . time() . '.' . $request->image->extension();
                $request->image->move(public_path("images"), $imageName);
                $gallery_image->image = 'images/' . $imageName;
            }
            $gallery_image->save();
            return redirect('/photogallery')->with('success','Updated successfully');
        }catch(\Exception $e){
            dd($e->getMessage());
            return response()->json(['error' => 'An error occurred while updating the image.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PhotoGallery::destroy($id);
        return redirect('/photogallery')->with('success','Deleted successfully');
    }

    public function destroySubPhoto(string $id)
    {
        SubPhotoGallery::destroy($id);
        return redirect('/photogallery')->with('success','Deleted successfully');
    }
}
