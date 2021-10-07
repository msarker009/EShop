@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit& Update Product</h4>
            <div class="card-body">
                <form action=" {{url('update-product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <select class="form-select">
                                <option value="">{{ $product->category->name}}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Small Description</label>
                            <textarea name="small_description" id="" rows="3" class="form-control">{{$product->small_description}}</textarea>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">original_price</label>
                            <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}" >
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">selling_price</label>
                            <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Tax</label>
                            <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">status</label>
                            <input type="checkbox"  name="status" {{$product->status== "1" ? 'checked':''}}>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Trending</label>
                            <input type="checkbox"  name="trending" {{$product->trending== "1" ? 'checked':''}}>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" id="" rows="3" class="form-control">{{$product->meta_keywords}}</textarea>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" rows="3" class="form-control">{{$product->meta_description}}</textarea>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{asset('add_productImage/'.$product->image)}}" alt="image" class="img_size">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
