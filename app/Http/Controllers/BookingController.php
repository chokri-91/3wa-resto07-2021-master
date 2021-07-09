<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //pour utilisateur authentifié//
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
        return view('booking.create', [
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'date',
            'booking_time' => 'required',
            'seats_nbr' => 'digits_between:1,8',
        ]);
        
        $booking = new Booking;
        //dd($request->day, $request->month, $request->year, $request->hour, $request->minutes, $request->seats);
        
        $date = $request->year. '-'. $request->month. '-' .$request->day;

        $time = $request->hour. ':'. $request->minutes;

        $seats = $request->seats;
        
        $booking->booking_date = $date;
        $booking->booking_time = $time;
        $booking->seats_nbr = $seats;
        $booking->user_id = Auth::id();

        $booking->save();
        return redirect()->route('booking.index')->with('addBooking', 'New booking has been add successfully');
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

        return view('booking.show', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
