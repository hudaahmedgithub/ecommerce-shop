<?php

namespace App\Http\Controllers\Frontend\Products;

use App\Models\Products\Product;
use App\Models\Products\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
	public function index(Request $request)
    {
        $products=Product::all();
		$categories = Category::all();
		return view('Frontend.products.index',compact('products','categories'));
    }
	public function productDetails($id)
	{
		$product=Product::findOrfail($id);
		return view('Frontend.products.product-details',compact('product'));
	}
	public function category($id)
	{
		$products=Product::where('category_id',$id)->get();
		
		$categories = Category::all();
		return view('Frontend.products.product_category',compact('products','categories'));
	}

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
