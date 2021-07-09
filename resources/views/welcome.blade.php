@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
      <h1>3WA Resto</h1> 
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            @foreach ($meals as $meal)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $meal->photo }}" alt="">

                    <div class="card-body">
                        <h3>{{ $meal->name }}</h3>
                        <p class="card-text">{{ $meal->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Show details</button>
                        </div>
                            <small class="text-muted">{{ $meal->sale_price }} €</small>
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
      {{ $meals->links() }}
    </div>
  </div>
@endsection