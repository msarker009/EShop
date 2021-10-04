@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <hh4>Add Product</hh4>
            <div class="card-body">
                <form action=" {{url('insert-product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <select class="form-select" name="category_id">
                                <option value="">Select a Category</option>
                                @foreach($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Small Description</label>
                            <textarea name="small_description" id="" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">original_price</label>
                            <input type="number" class="form-control" name="original_price">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">selling_price</label>
                            <input type="number" class="form-control" name="selling_price">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="quantity">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Tax</label>
                            <input type="number" class="form-control" name="tax">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">status</label>
                            <input type="checkbox"  name="status">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Trending</label>
                            <input type="checkbox"  name="trending">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" id="" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
