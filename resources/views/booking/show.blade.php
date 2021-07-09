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
                <a href="{{ route('booking.destroy', $booking->id) }}" data-toggle="modal" data-target="#confirmDeleteModal">
                    <button class="btn btn-danger"> <span class="fas fa-trash danger" > </span> </button>
                </a>
                
            </td>
        </tr>
    </tbody>
</table>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 you sure to delete your booking ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger" onclick="event.preventDefault();
                    document.querySelector('#delete-booking-form').submit();">Confirm delete
                </button>
            </div>
            <form id="delete-booking-form" action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
     </div>
</div>
@endsection