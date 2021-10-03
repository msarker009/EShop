<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category= Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }
    public function insert(Request $request){
        $category=new Category();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $file_name=$file->getClientOriginalName();
            $path=public_path().'/add_categoryImage';
            $file->move($path,$file_name);
            $category->image=$file_name;

        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular')==TRUE ? '1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_description=$request->input('meta_description');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->save();
        return redirect('/dashboard')->with('status','Category Added Successfully');

    }
}
