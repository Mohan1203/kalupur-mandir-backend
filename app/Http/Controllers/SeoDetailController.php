<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoDetails;

class SeoDetailController extends Controller
{

    public function index()
    {
        $seoDetails = SeoDetails::all();
        return view('admin.seo.seo',compact('seoDetails'));
    }


    public function create()
    {


    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'page_name' => 'required',
            'title'=>'required',
            'description'=>'required'
        ]);

        $page = new SeoDetails();

        $page->page_name = $request->page_name;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->schema = $request->schema_markup;
        $page->keywords = $request->keywords;

        $page->save();

         return redirect()->back()->with('success', 'Page added successfully');

    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seoDetail = SeoDetails::findOrFail($id);
        return view('admin.seo.editseo', compact('seoDetail'));
    }


    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'keywords' => 'required',
        ]);

        $seoDetail = SeoDetails::findOrFail($id);
        $seoDetail->update([
            'title' => $request->title,
            'keywords' => $request->keywords,
            'schema' => $request->schema_markup,
            'description' => $request->description,
        ]);

        return redirect('/seo')->with('success', 'SEO data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SeoDetails::destroy($id);
        return redirect('/seo')->with('success','SEO data deleted successfully');
    }
}
