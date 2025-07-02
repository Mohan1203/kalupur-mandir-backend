<?php

namespace App\Http\Controllers;

use App\Models\Booking;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::first();

        return view('admin.booking.booking',compact('booking'));
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
        $booking = Booking::first() ?? new Booking();

        // Handle individual tab saves based on type parameter
        if ($request->has('type')) {
            switch ($request->type) {
                case 'pooja':
                    $request->validate([
                        'pooja_description' => 'required|string'
                    ]);
                    $booking->pooja_description = $request->pooja_description;
                    $message = 'Pooja description saved successfully!';
                    break;
                    
                case 'yagna':
                    $request->validate([
                        'yagna_description' => 'required|string'
                    ]);
                    $booking->yagna_description = $request->yagna_description;
                    $message = 'Yagna description saved successfully!';
                    break;
                    
                default:
                    // If type is not recognized, save both (fallback)
                    $booking->pooja_description = $request->pooja_description;
                    $booking->yagna_description = $request->yagna_description;
                    $message = 'Booking details saved successfully!';
                    break;
            }
        } else {
            // Legacy support - save both if no type specified
            $booking->pooja_description = $request->pooja_description;
            $booking->yagna_description = $request->yagna_description;
            $message = 'Booking details saved successfully!';
        }

        $booking->save();

        return redirect()->back()->with('success', $message);
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
