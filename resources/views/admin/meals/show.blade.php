@extends('layouts.admin')

@section('admin-content')

<div class="card" style="width: 38rem;">
    <img class="card-img-top" src="{{ asset('storage/'.$meal->photo) }}" alt="{{ $meal->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $meal->name }}</h5>
            <p class="card-text">
                <ul>
                    <li>
                        <strong>Description: </strong>{{ $meal->description }}
                    </li>
                    <li>
                        <strong>Quantity in stock: </strong>{{ $meal->quantity }}
                    </li>
                    <li>
                        <strong>Buy price: </strong>{{ $meal->buy_price }}
                    </li>
                    <li>
                        <strong>Sell price: </strong>{{ $meal->sale_price }}
                    </li>
                </ul>

            </p>
          <a href="#" class="btn btn-outline-primary">Edit</a>
          <a href="#" class="btn btn-outline-danger">Delete</a>
        </div>
      </div>
      @endsection