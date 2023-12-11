<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Events\NewBooking;
use App\Http\Requests\BookingRequest;
use App\Mail\BookingConfirmationMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index() {
        return view('booking.index');
    }

    public function create(BookingRequest $request) {
        $booking = new Booking();
        $booking->name = $request->get('name');
        $booking->email = $request->get('email');
        $booking->date = Carbon::parse($request->get('date'), 'UTC')->toDateTimeString();
        $booking->phone_number = $request->get('phone_number');
        $booking->message = $request->get('message');

        $booking->save();

        $this->sendConfirmationMail($booking);
        Broadcast::event(new NewBooking($booking));

        return redirect()->route('booking.index')->with([
            'success' => 'Votre demande de rendez-vous a été enregistrée avec succès',
            'id' => $booking->id,
        ]);
    }

    public function show(Booking $booking) {
        return view('booking.show', compact('booking'));
    }

    public function live() {
        $bookings = Booking::all();
        return view('booking.live', compact('bookings'));
    }

    protected function sendConfirmationMail(Booking $booking)
    {
        $sujet = "Confirmation de Rendez-vous";
        $contenu = "Votre rendez-vous est confirmé pour le " . Carbon::parse($booking->date, 'UTC')->format('d/m/y H:i');

        Mail::to($booking->email)->send(new BookingConfirmationMail($sujet, $contenu));
    }
}



