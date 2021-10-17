@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">Home</a>

            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">
                @php  $total=0;
                @endphp
                @foreach($cartItem as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{asset('add_productImage/'.$item->product->image)}}"  width="70px" height="70px" alt="image">
                        </div>
                        <div class="col md-3 my-auto">
                            <h6>{{$item->product->name}}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>Tk {{$item->product->selling_price}}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden"  class="product_id" value="{{$item->product_id}}">
                            @if($item->product->quantity >= $item->product_quantity)
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 120px">
                                <button class="input-group-text changeQuantityBtn decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control quantity_input text-center" value="{{$item->product_quantity}}">
                                <button class="input-group-text changeQuantityBtn increment-btn">+</button>
                            </div>
                                @php
                                    $total +=$item->product->selling_price * $item->product_quantity;
                                @endphp
                            @else
                                <h6>Out of stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete_cart_item"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price: {{$total}}
                    <a h
                       href="{{url('checkout')}}" class="btn btn-success float-end">Proceed to Checkout</a>
                </h6>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('.increment-btn').click(function (e){
                e.preventDefault();
                let inc_value=$(this).closest('.product_data').find('.quantity_input').val();
                let value=parseInt(inc_value,10);
                value=isNaN(value) ? 0 : value;
                if(value < 10)
                {
                    value++;
                    $(this).closest('.product_data').find('.quantity_input').val(value);

                }
            });
            $('.decrement-btn').click(function (e){
                e.preventDefault();
                let dec_value=$(this).closest('.product_data').find('.quantity_input').val();
                let value=parseInt(dec_value,10);
                value=isNaN(value) ? 0 : value;
                if(value > 1)
                {
                    value--;
                    $(this).closest('.product_data').find('.quantity_input').val(value);

                }
            });

            <!-- add To Cart  -->
            $('.addToCartBtn').click(function (e){
                e.preventDefault();
                let product_id=$(this).closest('.product_data').find('.product_id').val();
                let product_quantity=$(this).closest('.product_data').find('.quantity_input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{route("add.cart")}}',
                    method:"post",
                    data:{
                        'product_id':product_id,
                        'product_quantity':product_quantity,
                    },
                    success:function (response){
                        swal(response.status);
                    }
                });
            });
            <!-- delete-cart-item -->
            $('.delete_cart_item').click(function (e){
                e.preventDefault();
                let product_id=$(this).closest('.product_data').find('.product_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{route("delete.cart")}}',
                    method:"post",
                    data:{
                        'product_id':product_id,
                    },
                    success:function (response){
                        window.location.reload();
                        swal(response.status);
                    }
                });
            });

            <!-- change quantity-->
            $('.changeQuantityBtn').click(function (e){
                e.preventDefault();
                let product_id=$(this).closest('.product_data').find('.product_id').val();
                let product_quantity=$(this).closest('.product_data').find('.quantity_input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{route("update.cart")}}',
                    method:"PUT",
                    data:{
                        'product_id':product_id,
                        'product_quantity':product_quantity,
                    },
                    success:function (response){
                        window.location.reload();
                    }
                });
            });

        });
    </script>
@endsection
