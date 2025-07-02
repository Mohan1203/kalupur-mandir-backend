<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yajman;

class YajmanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yajmans = Yajman::all();
        return view('admin.yajman.yajman',compact('yajmans'));
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
            'title'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'date' => 'required'
        ]);
        $yajman = new Yajman();
        $yajman->name = $request->title;
        $yajman->event_date = $request->date;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'yajman'. time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/images'), $imageName);
            $yajman->image_path = 'images/' .$imageName;
        }
        $yajman->save();
        return redirect()->back()->with('success', 'Yajman added successfully');
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
        $yajman = Yajman::where('id', $id)->first();
        return view('admin.yajman.edityajman', compact('yajman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $yajman = Yajman::where('id', $id)->first();
        $yajman->name = $request->title;
        $yajman->event_date = $request->date;
        if($request->hasFile('image')){
            if ($yajman->image && file_exists(public_path($yajman->image))) {
                unlink(public_path($yajman->image));
            }
            $imageName ='yajman' . time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $yajman->image_path = 'images/' . $imageName;
        }
        $yajman->save();
        return redirect('/yajman')->with('success', 'Yajman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Yajman::destroy($id);
        return redirect('/yajman');
    }
}
