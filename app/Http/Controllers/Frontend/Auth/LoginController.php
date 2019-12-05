<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Products\Category;
use App\Models\Utilities\Country;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Frontend\FrontendController;

class LoginController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::where('active', 'yes')->get();
        $countries = Country::where('active', 'yes')->get();

        view()->share('categories', $categories);
        view()->share('countries', $countries);
        $this->middleware('guest')->except('logout');
    }
}
