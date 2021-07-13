<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //pour utilisateur authentifié//

use App\Mail\NewBooking; // envoi de mail de confirmation
use Illuminate\Support\Facades\Mail; // envoi de mail de confirmation
use App\Booking;
use App\User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comingBookings = Auth::user()->bookings()->comingBookings()->orderBy('booking_date')->get(); // comingBookings() fonction dans le model (provider) //
        $passedBookings = Auth::user()->bookings()->passedBookings()->orderBy('booking_date', 'desc')->get(); // passedBookings() fonction dans le model (provider) //

        return view('booking.index', [
            'comingBookings' => $comingBookings, // rechercher les bookings en attentes de l'utilisateur authentifié () //
            'passedBookings' => $passedBookings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate($this->validationRules());
        
        $booking = new Booking;
      
        $date = $request->year. '-'. $request->month. '-' .$request->day;
        $time = $request->hour. ':'. $request->minutes;
        $seats = $request->seats;
        
        $booking->booking_date = $date;
        $booking->booking_time = $time;
        $booking->seats_nbr = $seats;
        $booking->user_id = Auth::id();

        $booking->save();
        
        Mail::to(Auth::user()->email)->send(new NewBooking($booking));
        return redirect()->route('booking.index')->with('bookingNotification', 'Booking has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('booking.show', ['booking' => $booking]);
    }

    //////////// ou ///////////////

    // public function show($id)
    // {
    //     return view('booking.show', ['booking' => Booking::find($id)]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        // return view('booking.show', ['booking' => $booking]);

        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Booking $booking)
    {
        $validatedData = $request->validate($this->validationRules());

        $date = $request->year. '-'. $request->month. '-' .$request->day;
        $time = $request->hour. ':'. $request->minutes;
        $seats = $request->seats;
        //dd($date, $time, $seats, $id);
        
        $booking->booking_date = $date;
        $booking->booking_time = $time;
        $booking->seats_nbr = $seats;
        $booking->user_id = Auth::id();

        $booking->save();
        return redirect()->route('booking.index')->with('bookingNotification', 'Booking has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
        $booking->delete();
        return redirect()->route('booking.index')->with('bookingNotification', 'Booking has been deleted successfully');
    }


    // method pour la validation des formulaires //
    private function validationRules()
    {
        return [
            'booking_date' => 'date',
            'booking_time' => 'required',
            'seats_nbr' => 'digits_between:1,8',
        ];
    }
}
