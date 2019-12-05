<?php

namespace App\Http\Middleware;

use Auth;
use Cart;
use Closure;

class CartUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* if (Auth::check())
            Cart::session(Auth::user()->id);
        else
            Cart::session('cart'); */

        Cart::session('cart');

        $cartContent = Cart::getContent();
        $cartCount = $cartContent->count();

        view()->share('cartCount', $cartCount);
        view()->share('cartContent', $cartContent->toArray());

        return $next($request);
    }
}
