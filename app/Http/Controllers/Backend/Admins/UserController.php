<?php

namespace App\Http\Controllers\Backend\Admins;

use App\User;
use App\Models\Admins\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class UserController extends Controller
{
	    public function index()
    {
		
        $users=User::all();
		$roles=Role::pluck('name');
		return view('backend.user.index',compact('users','roles'));
    }
      public function create()
{
	$roles=Role::get();
    $permissions=Permission::all();
	return view('backend.user.create',compact('roles','permissions'));
}
        public function store(Request $request)
    {
			$admin=Admin::create($request->only('email', 'name', bcrypt('password')));
		    $roles = $request['roles']; 
        if (isset($roles)) {
          foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();  
            $admin->assignRole($role_r);
            }
		}
	 return 
		redirect()->route('Backend.admins.index');
  
		}
	
   /* public function __construct(User $user)
    {
        $this->model    = $user;
        $this->view     = "user";
        $this->singular = 'user';
        $this->plural   = 'users';
    }*/
}
