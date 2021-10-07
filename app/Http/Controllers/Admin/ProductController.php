<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('admin.product.index',compact('product'));;
    }
    public function add()
    {
        $category=Category::all();
        return view('admin.product.add',compact('category'));

    }
    public function insert(Request $request)
    {
        $product=new Product();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $file_name=$file->getClientOriginalName();
            $path=public_path().'/add_productImage';
            $file->move($path,$file_name);
            $product->image=$file_name;
        }
        $product->category_id=$request->input('category_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->quantity=$request->input('quantity');
        $product->tax=$request->input('tax');
        $product->status=$request->input('status')==TRUE ? '1':'0';;
        $product->trending=$request->input('trending')==TRUE ? '1':'0';;
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');
        $product->save();
        return redirect('/products')->with('status','Product Added Successfully');

    }

    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function update(Request $request,$id)
    {
        $product=Product::find($id);

        if($request->hasFile('image'))
        {
            $path='add_productImage/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $file_name=$file->getClientOriginalName();
            $path=public_path().'/add_productImage';
            $file->move($path,$file_name);
            $product->image=$file_name;
        }
        /*$product->category_id=$request->input('category_id');*/
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->quantity=$request->input('quantity');
        $product->tax=$request->input('tax');
        $product->status=$request->input('status')==TRUE ? '1':'0';;
        $product->trending=$request->input('trending')==TRUE ? '1':'0';;
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');
        $product->update();
        return redirect('/products')->with('status','Product updated Successfully');
    }
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product->image)
        {
            $path = 'add_productImage/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('/products')->with('status','Product Deleted Successfully');
    }
}
