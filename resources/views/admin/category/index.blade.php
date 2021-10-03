@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <hh4>Category Page</hh4>
            <div class="card-body">
               <table class="table">
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
                                <img src="{{asset('/add_categoryImage/'.$item->image)}}" alt="image" class="">
                            </td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
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
