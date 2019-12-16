<?php

namespace App\Http\Controllers\Frontend\Users;
use App\User;
use App\Models\Products\Product;
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
		       return view('frontend.users.index',compact('user'));
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
		$request->validate([
			'address'=>'required',
			'phone'=>'required',
			'city'=>'required'
		]);
		
		$post=User::find($request->id);
		$post->address=$request->address;
		$post->phone=$request->phone;
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
	
public function postDelete(Request $request)
{
	$user=User::find($request->id)->delete();
	return response()->json();
	
	
}
		public function password()
	{
	  return view('profile.updatePassword');	
	}
	public function updatePassword(Request $request){
		
		$oldPassword=$request->oldPassword;
		
		$newPassword=$request->newPassword;
		
			if(!Hash::check($oldPassword,Auth::user()->password))
			{
				return back()->with('error','your current password is not correct');
			}
		else
		{
			$request->user()->fill(['password'=>Hash::make($newPassword)])->save();
			return back()->with('status','your  password is updated');
		}
	}
	
}
