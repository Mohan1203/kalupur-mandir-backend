<?php

namespace App\Http\Controllers;
use App\Models\Testimonials;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonials::all();
        return view('admin.home.testimonials', compact('testimonials'));
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
            $testimonials = new Testimonials();
            $testimonials->name = $request->testimonail_name;
            $testimonials->country = $request->testimonail_country;
            $testimonials->description = $request->testimonail_description;
            $testimonials->save();
            return redirect()->back()->with('success', 'Testimonial added successfully');
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
        $testimonial = Testimonials::find($id);
        return view('admin.home.edittestimonials',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonials = Testimonials::where('id', $id)->first();
        $testimonials->name = $request->testimonail_name;
        $testimonials->country = $request->testimonail_country;
        $testimonials->description = $request->testimonail_description;
        $testimonials->save();
        return redirect('/testimonials')->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonials::destroy($id);
        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }
}
