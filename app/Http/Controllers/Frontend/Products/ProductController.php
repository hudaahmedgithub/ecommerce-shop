<?php

namespace App\Http\Controllers\Frontend\Products;
use App\Models\Products\Review;
use App\Models\Products\Product;
use App\Models\Products\Reservation;
use App\Models\Products\Image;
use App\Models\Products\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ProductController extends Controller
{
	public function index(Request $request)
    {
        $products=Product::orderBy('id','desc')->paginate(12);
		$categories = Category::all();
		$max=Product::max('price');
		$min=Product::min('price');
		return view('Frontend.products.index',compact('products','categories','max','min'));
    }
	public function productDetails($id)
	{
		$product=Product::findOrfail($id);
		$rate=Review::where('product_id',$product->id)->get();
		$products=Product::where('viewed' ,1)->get();
		$reservations=Reservation::where('status' ,'success')->get();
		$images=Image::where('product_id',$id)->get();
		return view('Frontend.products.product-details',compact('product','images','rate','products','reservations'));
	}
	public function category(Request $request)
	{
		$products=Product::where('id',$request->id)->get();
		
		$categories = Category::all();
		 return view('frontend.products.products',['products'=>$products,'categories'=>$categories]);
	}
   public function allProducts()
   {
	   $products=Product::all();
	  return view('frontend.products.products',['products'=>$products]);
   }
	public function getCategory(Request $request)
	{
	if($request->ajax())
		{
		$data=Product::select('products.id', 'product_translations.name')
        ->join('product_translations', 'products.id', '=', 'product_translations.product_id')
        ->where('name','like','%'. $request->search .'%')
        ->firstOrFail();
		return response()->json(['data'=>$data]);
	}
	}
	public function getSearch(Request $request)
	{
	if($request->ajax())
		{
		$data=Product::select('products.id', 'product_translations.name')
        ->join('product_translations', 'products.id', '=', 'product_translations.product_id')
        ->where('name','like','%'. $request->search .'%')
        ->firstOrFail();
		
		$products=Product::where('id',$data->id)->get();
		 return view('frontend.products.search',['products'=>$products]);
		
	}
	}
	public function low(Request $request)
	{
	if($request->value=="1")
		{
		$products=Product::orderBy('id','desc')->get();
		return view('frontend.products.lower',['products'=>$products]);
		}
	if($request->value=="2")
		{
		$products=Product::orderBy('price','asc')->get();
		return view('frontend.products.lower',['products'=>$products]);
		}
	if($request->value=="3")
		{
		$products=Product::orderBy('price','desc')->get();
		return view('frontend.products.lower',['products'=>$products]);
		}
	if($request->value=="4")
		{
		$products=Review::orderBy('rate','desc')->get();
		return view('frontend.products.rate',['products'=>$products]);
		}
	}
	public function high()
	{
		$products=Product::orderBy('price','asc')->get();
		return view('frontend.products.high',['products'=>$products]);
	}
	
	public function getSide(Request $request)
	{
		$data=Product::where('category_id',$request->id)->get();
		
		return view('frontend.products.side',['data'=>$data]);
	}
		public function rangePrice(Request $request)
	{
	
		$products=Product::where('price', '<=',$request->price)->orderBy('price','asc')->get();
		return view('frontend.products.range',['products'=>$products]);
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
