@extends('layouts.front')

@section('title')
    {{$category->name}}
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{$category->name}}</h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$category->name}}</h2>
                    <div class="row">
                        @foreach($product as $item)
                            <div class="col-md-3 mb-3">
                                <a href="{{url('view-category/'.$category->slug.'/'.$item->slug)}}">
                                    <div class="card">
                                        <img src="{{asset('add_productImage/'.$item->image)}}" alt="image">
                                        <div class="card-body">
                                            <h5>{{$item->name}}</h5>
                                            <p>{{$item->description}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
