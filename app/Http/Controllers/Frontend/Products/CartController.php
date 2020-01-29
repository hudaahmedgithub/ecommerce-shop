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
		$carts=Cart::getContent();//this from laravel plugin
		$cartItems=$carts->sort();
		return view('Frontend.cart.shopping-cart',compact('cartItems'));	
	}
	 public function addItem($id)
	 {
		 $product=Product::findOrfail($id);
		 Cart::add(['id'=>$id,'name'=>$product->name,'quantity'=>1,'price'=>$product->price,
        'attributes' => ['featured_image' => $product->featured_image,'color'=>$product->color,'stock'=>$product->stock]]);
		 return back();
	 }
	public function update(Request $request ,$id)
	{
		$qty=$request->qty;
		$row=Cart::get($request->proId);
		$num=$row->quantity;
		$upQty=$qty-$num;
		$proID=$request->proId;
		$product=Product::findOrfail($proID);
		$stock=$product->stock;
		$price=$product->price;
		
	if($qty<=$stock)
		{
			Cart::update($id,array(
           'quantity' => $upQty));
			return back()->with('status','ok this product updated');	
		}
	
		else
		{
			return back()->with('error','please check if qty is bigger than stock');
		}
		
	}
	public function remove(Request $request)
	{
		Cart::remove($request->id);
		return response()->json();
	
	}
	
}

