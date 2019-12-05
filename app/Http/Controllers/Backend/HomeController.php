<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\PropertyContact;
use App\Http\Controllers\Backend\BackendController;

class HomeController extends BackendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = DB::table('products')
                    ->select(
                        DB::raw('COUNT(id) as `products`'),
                        DB::raw("MONTH(created_at) as `month`")
                    )
                    ->where(DB::raw("YEAR(created_at)"), '=', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

        $data = [];
        foreach($products as $product) {
            $data[] = [
                'month' => convertMonthIdToName($product->month),
                'value' => $product->products
            ];
        }

        return view('backend.home.home', compact('data'));
    }
}
