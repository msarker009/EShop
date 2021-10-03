@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <hh4>Category Page</hh4>
            <div class="card-body">
               <table class="table table-bordered  table-striped">
                   <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
                        @foreach($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                <img src="{{asset('/add_categoryImage/'.$item->image)}}" alt="image" class="cate_image">
                            </td>
                            <td>
                                <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                   </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection
