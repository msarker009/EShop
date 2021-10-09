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
}
