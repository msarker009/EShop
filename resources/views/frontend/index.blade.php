@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach($feature_product as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{asset('add_productImage/'.$item->image)}}" alt="image">
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <small>{{$item->selling_price}}</small>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
