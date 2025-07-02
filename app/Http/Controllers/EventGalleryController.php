<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventGallery;
use App\Models\EventSubGallery;

class EventGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventImages = EventGallery::all();
        $subEventImages = EventSubGallery::all();
        return view('admin.eventgallery.eventgallery',compact('eventImages', 'subEventImages'));
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
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svgs',
        ]);

        $eventGallery = new EventGallery();
        $eventGallery->description = $request->title;

        if ($request->hasFile('image')) {
            $imageName = 'event'. time() . '.' .$request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $eventGallery->image_path = 'images/' . $imageName;
        }
        $eventGallery->save();

        return redirect()->back()->with('success', 'Event Gallery created successfully.');
    }


    public function storeSubEventPhotos(Request $request)
    {
        $request->validate([
            'image_id' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svgs',
        ]);

        $subPhotoGallery = new EventSubGallery();
        $subPhotoGallery->image_id = $request->image_id;
        $subPhotoGallery->description = $request->title;

        if ($request->hasFile('image')) {
            $imageName = 'subevent'. time() . '.' .$request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $subPhotoGallery->image_path = 'images/' . $imageName;
        }
        $subPhotoGallery->save();

        return redirect()->back()->with('success', 'Sub Event Gallery created successfully.');
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
        $eventImage = EventGallery::findOrFail($id);
        return view('admin.eventgallery.editeventgallery', compact('eventImage'));
    }

    public function editSubPhoto(string $id)
    {
        $subEventImage = EventSubGallery::findOrFail($id);
        return view('admin.eventgallery.editsubeventgallery', compact('subEventImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eventGallery = EventGallery::where('id', $id)->first();
        $eventGallery->description = $request->title;
       if($request->hasFile('image')) {
                if ($eventGallery->image_path && file_exists(public_path($eventGallery->image_path))) {
                    unlink(public_path($eventGallery->image_path));
                }
                $imageName ='mainPhoto' . time() . '.' . $request->image->extension();
                $request->image->move(public_path("images"), $imageName);
                $gallery_image->image_path = 'images/' . $imageName;
        }
        $eventGallery->save();
        return redirect('/eventgallery')->with('success', 'Event Gallery updated successfully.');
    }

    public function updateSubEventPhotos(Request $request, string $id)
    {
        $subEventGallery = EventSubGallery::where('id', $id)->first();
        $subEventGallery->description = $request->title;
        if($request->hasFile('image')) {
            if ($subEventGallery->image_path && file_exists(public_path($subEventGallery->image_path))) {
                unlink(public_path($subEventGallery->image_path));
            }
            $imageName ='subPhoto' . time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $subEventGallery->image_path = 'images/' . $imageName;
        }
        $subEventGallery->save();
        return redirect('/eventgallery')->with('success', 'Sub Event Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EventGallery::destroy($id);
        return redirect('/eventgallery')->with('success', 'Event Gallery deleted successfully.');
    }
}
