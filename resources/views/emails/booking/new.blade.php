@component('mail::message')
# 3WA Resto

Dear **{{ Auth::user()->first_name }}** **{{ Auth::user()->last_name }}**

Your booking has been received, we look forward to see you.<br>
Your booking will be on **{{ $booking->booking_date }}** at **{{date('H:i',strtotime($booking->booking_time))}}** for **{{ $booking->seats_nbr }}** persons.

@component('mail::button', ['url' => route('booking.show', $booking->id)])
Booking details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent