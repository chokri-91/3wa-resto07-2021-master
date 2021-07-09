@extends('layouts.app')
@section('content')


<table class="table">
<thead>
    <th>Booking date</th>
    <th>Booking time</th>
    <th>Number of seats</th>
    <th>Operations</th>
</thead>
<tbody>
    <tr>
        <td>{{$booking->booking_date}}</td>
        <td>{{$booking->booking_time}}</td>
        <td>{{$booking->seats_nbr}}</td>
        <td>
            <a href="{{ route('booking.edit', $booking->id) }}"> <button class="btn btn-primary"> <i class="fas fa-edit primary" ></i></button></a>
            <a href="{{ route('booking.destroy', $booking->id) }}"> <button class="btn btn-danger"> <span class="fas fa-trash danger" > </span> </button></a>
        </td>
    </tr>
</tbody>
</table>
@endsection