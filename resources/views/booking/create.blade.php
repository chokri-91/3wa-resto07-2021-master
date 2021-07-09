@extends('layouts.app')
@section('content')

<h2> Make reservation </h2>

<form data-validate class="generic-form" method="POST" action="{{ route('booking.store') }}">
<!--  genre de securité il faut tjr ajouter @csrf pour se protéger contre les requettes CSRF(cross-site request forgery ) attacks -->
@csrf

<fieldset class="py-4"> 

<label> <strong> Booking date: </strong></label> 
    <select id="day" name="day" value="{{ old('booking_date') }}" class="@error('booking_date') {{'is-invalid'}} @enderror">
        <?php for($i=1; $i<=31; $i++):?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php endfor; ?>
    </select>
    <select id="month" name="month">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>

    <select id="year" name="year">
        <option value="2021">{{ date("Y") }}</option>
        <option value="2022">{{ date("Y")+1 }}</option>
    </select> 
    
    <strong class="pl-3"> Booking time : </strong>
    <select id="hour" name="hour" value="{{ old('booking_date') }}" class="@error('booking_date') {{'is-invalid'}} @enderror">
    <?php for($i=12; $i<24; $i++):?>
            <option><?=$i?></option>
        <?php endfor; ?>
    </select>
    <select id="minutes" name="minutes">
        <option value="00">00</option>
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="45">45</option>
    </select> <br><br>
    <!-- message d'erreur en cas d'erreur -->
    @error('booking_date')<div class="text-danger">{{ $message }}</div>@enderror
    @error('booking_time')<div class="text-danger">{{ $message }}</div>@enderror
    <label> <strong>Number of seats: </strong></label> 
    
    <select id="seats" name="seats" value="{{ old('booking_date') }}" class="@error('booking_date') {{'is-invalid'}} @enderror">
        <?php for($i=1; $i<9; $i++):?>
            <option value="<?=$i?>"> <?=$i?> </option>
        <?php endfor; ?>
    </select>
    </fieldset> <br><br>
    @error('seats_nbr')<div class="text-danger">{{ $message }}</div>@enderror

    <button class="btn btn-primary" type="submit">Confirm </button>
    <button class="btn btn-danger" type="reset">Reset </button>

</form>
@endsection