<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Pages::firstOrCreate([]);
        return view('admin.pages.pages', compact('pages'));
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
        $pages = Pages::firstOrCreate([]);
        $pages->cookie_policy = $request->cookie_policy;
        $pages->privacy_policy = $request->privacy_policy;
        $pages->terms_and_conditions = $request->terms_and_conditions;
        $pages->save();
        return redirect()->back()->with('success', 'Pages updated successfully!');
    }

    /**
     * Save Cookie Policy
     */
    public function saveCookiePolicy(Request $request)
    {
        $request->validate([
            'cookie_policy' => 'required|string'
        ]);

        $pages = Pages::firstOrCreate([]);
        $pages->cookie_policy = $request->cookie_policy;
        $pages->save();
        
        return redirect()->back()->with('success', 'Cookie Policy updated successfully!');
    }

    /**
     * Save Privacy Policy
     */
    public function savePrivacyPolicy(Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required|string'
        ]);

        $pages = Pages::firstOrCreate([]);
        $pages->privacy_policy = $request->privacy_policy;
        $pages->save();
        
        return redirect()->back()->with('success', 'Privacy Policy updated successfully!');
    }

    /**
     * Save Terms and Conditions
     */
    public function saveTermsConditions(Request $request)
    {
        $request->validate([
            'terms_and_conditions' => 'required|string'
        ]);

        $pages = Pages::firstOrCreate([]);
        $pages->terms_and_conditions = $request->terms_and_conditions;
        $pages->save();
        
        return redirect()->back()->with('success', 'Terms & Conditions updated successfully!');
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
