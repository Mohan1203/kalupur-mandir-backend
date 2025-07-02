<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus;
use App\Models\Setting;

class AboutuseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutus = Aboutus::all();
        $setting = Setting::first();
        return view('admin.about.about-us',compact('aboutus','setting'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'start_day' => 'required',
            'end_day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Aboutus::create([
            'start_day' => $request->start_day,
            'end_day' => $request->end_day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->back()->with('success', 'About Us details added successfully.');
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
        //
    }

    public function editTimerange(string $id)
    {
        $timerange = Aboutus::find($id);
        return view('admin.about.edit-timerange', compact('timerange'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateTimerange(Request $request, string $id){
        $timerange = Aboutus::find($id);
        $timerange->start_day = $request->start_day;
        $timerange->end_day = $request->end_day;
        $timerange->start_time = $request->start_time;
        $timerange->end_time = $request->end_time;
        $timerange->save();
        return redirect('/aboutus')->with('success','updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyTimerange(string $id){
        Aboutus::destroy($id);
        return redirect('/aboutus')->with('success','Timerange deleted successfully');
    }
}
