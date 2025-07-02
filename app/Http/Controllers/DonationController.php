<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;

class DonationController extends Controller
{
    //
    public function index(){
        $donations = Donations::all();
        return view('admin.donation.donation',compact('donations'));
    }

    public function store(Request $request){
        $donation = Donations::create($request->all());
    }
}
