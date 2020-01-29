<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Http\Request;
use App\Models\Products\Slider;
use App\Models\Products\Product;
use App\Models\Products\Category;
use App\Models\Products\Review;
use Auth;
use Hash;
use App\User;
class HomeController extends FrontendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$sliders=Slider::get();
		$comments=Review::all();
		$products=Product::all();
		$categories=Category::all();
		$max=Product::max('price');
		$min=Product::min('price');
		$productsOnly=Product::take(5)->orderBy('id','desc')->get();
        return view('frontend.home.home',compact('sliders','comments','products','productsOnly','categories','min','max'));
    }
public function store(Request $request)
	{
	$password=$request->password;
	$email=$request->email;

	if(Auth::user()->email==$email && Hash::check($password,Auth::user()->password))
	{
		$review=new Review;
		$review->user_id=Auth::user()->id;
		$review->rate=$request->rate;
		$review->product_id=$request->product_id;
		$review->comment=$request->comment;
		$review->save();
		$user=User::find(Auth::user()->id);
		$product=Product::find($request->product_id);
		return response()->json(['data'=>$request->all(),'img'=>$user->image,'name'=>$user->first_name,'created_at'=>$review->created_at->diffForHumans(),'product'=>$product->name]);
	}
	else
	{
		return back()->with('error','check password or email');
	}
  }
  
	public function read()
	{
		$review=Review::all();
		return response()->json(['data'=>$review]);
	}
	public function HomeSearch(Request $request)
	{
		
		$categories = Category::all();
		$max=Product::max('price');
		$min=Product::min('price');
        $products=Product::select('products.id','products.price','products.featured_image','products.before_price','product_translations.description','product_translations.name')
        ->join('product_translations', 'products.id', '=', 'product_translations.product_id')
        ->where('name','like','%'. $request->search .'%')
		->where('category_id',$request->brand)
		->where('price', '<=',$request->price)
        ->paginate(12);
		return view('frontend.products.index',compact('products','max','min','categories'));
	}
}






