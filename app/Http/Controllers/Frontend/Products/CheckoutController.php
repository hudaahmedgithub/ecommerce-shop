<?php

namespace App\Http\Controllers\Frontend\Products;

use Illuminate\Http\Request;
use Cart;
use App\Models\Products\Product;
use App\Models\Products\Address;
use App\Models\Products\Order;
use Auth;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
   public function index()
   {
	    $carts=Cart::getContent();
		return view('Frontend.cart.checkout',compact('carts'));
	}
	public function address(Request $request)
	{
		$request['user_id']=Auth::user()->id;
		Address::create($request->all());
		Order::createOrder();
		Cart::destroy();
		return view('profile.thanksyou');
	}
}
