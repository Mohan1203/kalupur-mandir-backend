<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.setting',compact('setting'));
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
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'iframe_key' => 'nullable|string',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->description = $request->description;

        // Handle logo upload
        if($request->hasFile('logo')){
             if ($setting->logo && file_exists(public_path($setting->logo))) {
                unlink(public_path($setting->logo));
            }
            $imageName ='setting' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path("images"), $imageName);
            $setting->logo = 'images/' . $imageName;
        }

        // Handle contact information
        if ($request->filled('email')) {
            $setting->email = $request->email;
        }
        
        if ($request->filled('phone_number')) {
            $setting->contact_number = $request->phone_number;
        }
        
        if ($request->filled('address')) {
            $setting->address = $request->address;
        }
        
        // Process iframe HTML to extract src URL
        if ($request->filled('iframe_key')) {
            $iframeSrc = $this->extractIframeSrc($request->iframe_key);
            $setting->iframe_key = $iframeSrc;
        }

        $setting->save();
        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    /**
     * Extract src attribute from iframe HTML
     */
    private function extractIframeSrc($iframeHtml)
    {
        // Remove any extra whitespace and newlines
        $iframeHtml = trim($iframeHtml);
        
        // Use regex to extract src attribute from iframe
        preg_match('/src=["\']([^"\']+)["\']/', $iframeHtml, $matches);
        
        // Return the src URL if found, otherwise return the original input
        return isset($matches[1]) ? $matches[1] : $iframeHtml;
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
