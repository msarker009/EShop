<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $feature_product=Product::where('trending','1')->get();
        $feature_category=Category::where('popular','1')->get();
        return view('frontend.index',compact('feature_product','feature_category'));
    }
    public function category()
    {
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));

    }
    public function ViewCategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $product=Product::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','product'));

        }
        else
        {
            return redirect('/')->with('status','Slug does not found');
        }
    }
    public function ViewProduct($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $product=Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('product'));

            }
            else
            {
                return redirect('/')->with('status','The link was broken');
            }
        }
        else
        {
            return redirect('/')->with('status','No such category found');
        }
    }

}
