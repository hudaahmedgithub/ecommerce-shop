<?php

namespace App\Http\Controllers\Frontend\Products;

use Illuminate\Http\Request;
use Cart;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
class CartController extends Controller
{
    public function index()
	{
		$cartItems=Cart::getContent();//this from laravel plugin
		//dd($cartItems);
		return view('Frontend.cart.shopping-cart',compact('cartItems'));
		
	}

	 public function addItem($id)
	 {
		 $product=Product::findOrfail($id);
		 Cart::add($id,$product->name,$product->price,1,$product->featured_image,$product->stock);
		 return back();
	 }
	public function update(Request $request ,$id)
	{
	//dd($request);
		$qty=$request->qty;
		$proID=$request->proId;
		$product=Product::findOrfail($proID);
		$stock=$product->stock;
		if($qty<=$stock)
		{
			Cart::update($id,array(
           'qty' => $qty));
				return back()->with('status','ok this product updated');
		}
	
		else
		{
			return back()->with('error','please chek if qty is bigger than stock');
		}
		
	}
	public function destroy($id)
	{
		Cart::remove($id);
		return back();
	}
	
}

