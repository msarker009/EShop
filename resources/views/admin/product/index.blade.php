@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <hh4>Product Page</hh4>
            <div class="card-body">
                <table class="table table-bordered  table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Name</th>
                        <th>selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>
                                <img src="{{asset('add_productImage/'.$item->image)}}" alt="image" class="cate_image">
                            </td>
                            <td>
                                <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
