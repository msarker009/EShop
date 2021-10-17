@extends('layouts.front')

@section('title')
   Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">Home </a>//
                <a href="">Checkout</a>

            </h6>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter city">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter state">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pincode</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItem as $item)
                               <tr>
                                   <td>{{$item->product->name}}</td>
                                   <td>{{$item->product->quantity}}</td>
                                   <td>{{$item->product->selling_price}}</td>
                               </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
