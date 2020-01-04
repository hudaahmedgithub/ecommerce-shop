<?php

namespace App\Http\Controllers\Frontend\Users;
use App\User;
use App\Models\Products\Product;
use App\Models\Products\Reservation;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Http\Controllers\Controller;
class UserController extends Controller
{	
	public function index()
	{
		if(Auth::user())
		{
			$user=User::find(Auth::user()->id);
			$products=Product::where('viewed' ,1)->get();
			$reservations=Reservation::where('status' ,'success')->get();
			//dd($reservations);
		      return view('frontend.users.index',compact('user','products','reservations'));
		}
		else 
			return redirect('/login');
			
	}
	  public function read(Request $request)
	{
		$user=User::find($request->id);
		return response()->json(['data'=>$user]);
	}
	
	public function post(Request $request)
	{
		$request->validate([
			'name'=>'required',
			'email'=>'required',
			'password'=>'required'
		]);
		$post=new User;
		$post->name=$request->name;
		$post->email=$request->email;
		$post->password=bcrypt($request->password);
		$post->save();
		return response()->json(['data'=>$request->all(),'id'=>$post->id]);
	}
	public function editAddress(Request $request)
	{
		$post=User::find($request->id);
		$post->address=$request->address;
		$post->country=$request->country;
		$post->city=$request->city;
		$post->save();

		return response()->json(['data'=>$request->all(),'id'=>$post->id]);
	}
	public function passEdit(Request $request)
	{
		   $user=User::find($request->id);
		    $oldPassword=$request->oldPassword;
		    $newPassword=$request->newPassword;
		   if(Hash::check($oldPassword,$user->password))
		  {
			   $user->password=bcrypt($request->newPassword);
			  $user->save();
			 return response()->json(['message' => 'Edited Successfully',
            'type' => 'success']);
			}
		else
		{
			
		}
}
	public function order(Request $request)
	{
		$orders=Reservation::where('user_id',$request->id)->get();
	
		return view('frontend.users.order',['orders'=>$orders]);
	}
	
	public function details(Request $request)
	{
		$user=User::find($request->id);
		
		return view('frontend.users.details',['user'=>$user]);
	}
    public function saveDetails(Request $request)
	{
		$user=User::find($request->id);
		$user->first_name=$request->first;
		$user->last_name=$request->last;
		$user->about=$request->about;
		$user->gender=$request->gender;
		$user->phone=$request->phone;
		$user->save();
		
		return response()->json(['data'=>$request->all()]);
	}
	
	
	
}
