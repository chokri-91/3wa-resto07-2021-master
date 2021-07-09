@extends('layouts.app')
@section('content')

@if (session('addBooking'))
    <div class="alert alert-success alert-dismissible fade show">
        {{session('addBooking')}}

    </div>
@endif

<h1> List of Bookings </h1>
<a href="{{route('booking.create')}}" class="float-right btn-primary"> Book now </a>

<div class="row py-4">
    <div class="col">
        <h2>Upcoming bookings</h2>
    <ul class="list-group">
        @foreach ($comingBookings as $booking)
        <a href="{{route('booking.show', $booking->id)}}"> <li class="list-group-item list-group-item-action">
            
            Booking will be <strong>{{ $booking->booking_date }}</strong>
            at <strong>{{date('H:i',strtotime($booking->booking_time))}}</strong>
            <span class="badge badge-primary badge-pill float-right">{{ $booking->seats_nbr }} persons</span>
        </li></a>
        @endforeach
    </ul>
    </div>
    <div class="col">
        <h2>Old bookings</h2>
    <ul class="list-group">

            @foreach ($passedBookings as $booking)
            <li class="list-group-item list-group-item-action">
                
                Booking was for the <strong>{{ $booking->booking_date }}</strong>
                at <strong>{{date('H:i',strtotime($booking->booking_time))}}</strong>
                <span class="badge badge-primary badge-pill float-right">{{ $booking->seats_nbr }} persons</span>
            </li>
            @endforeach
    </ul>
    </div>
</div>
@endsection