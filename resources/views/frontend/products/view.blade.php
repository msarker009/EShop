@extends('layouts.front')

@section('title',$product->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}"> Collections</a>/
                <a href="{{url('category/'.$product->category->slug)}}">{{$product->category->name}}</a>/
                <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('add_productImage/'.$product->image)}}"  class="w-100" alt="image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$product->name}}
                            @if($product->trending == '1')
                            <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Original Price: <s>Tk {{ $product->original_price}}</s> </label>
                        <label class="me-3">Selling Price: Tk {{ $product->selling_price}}</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if($product->quantity > 0 )
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$product->id}}" class="product_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 120px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control quantity_input">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br/>
                                @if($product->quantity > 0 )
                                    <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            $('.increment-btn').click(function (e){
                e.preventDefault();
                let inc_value=$('.quantity_input').val();
                let value=parseInt(inc_value,10);
                value=isNaN(value) ? 0 : value;
                if(value < 10)
                {
                    value++;
                    $('.quantity_input').val(value);

                }
            });
            $('.decrement-btn').click(function (e){
                e.preventDefault();
                let dec_value=$('.quantity_input').val();
                let value=parseInt(dec_value,10);
                value=isNaN(value) ? 0 : value;
                if(value > 1)
                {
                    value--;
                    $('.quantity_input').val(value);

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

        });
    </script>
@endsection
