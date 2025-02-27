<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function getAllbookings()
    {
        $bookings = Booking::with(['user', 'event'])->get();
        return response()->json(['message'=> 'Data found', 'data'=> $bookings]);   
    }
}
