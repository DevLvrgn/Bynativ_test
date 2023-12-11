<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingsCollection;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::all();

        return new BookingsCollection($bookings);
    }
}
