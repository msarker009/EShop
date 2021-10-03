@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <hh4>Edit Category</hh4>
            <div class="card-body">
                <form action=" {{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{$category->status =="1" ? 'checked': ''}}>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="">Popular</label>
                            <input type="checkbox"  name="popular" {{$category->popular =="1" ? 'checked': ''}}>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" id="" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" rows="3" class="form-control">{{$category->meta_description}}</textarea>
                        </div>

                            <div class="col-md-12  mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" >
                                <img src="{{asset('add_categoryImage/'.$category->image)}}" alt="image" class="img_size">
                            </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
