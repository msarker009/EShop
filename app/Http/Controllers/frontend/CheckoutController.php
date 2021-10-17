<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItem=Cart::where('user_id',Auth::id())->get();
        foreach($old_cartItem as $item){
            if(!Product::where('id',$item->product_id)->where('quantity','>=',$item->product_quantity)->exists())
            {
                $removeItem=Cart::where('user_id',Auth::id())->where('product_id',$item->product->id)->first();
                $removeItem->delete();
            }
        }
        $cartItem=Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartItem'));
    }
}
