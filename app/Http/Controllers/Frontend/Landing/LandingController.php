<?php

namespace App\Http\Controllers\Frontend\Landing;

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\DB;
use App\Models\Products\Slider;

class LandingController extends FrontendController
{
    /**
     * Display the landing page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = $this->getSliderProducts();

        $egyptProducts = $this->getEgyptProducts();

        $russiaProducts = $this->getRussiaProducts();

        view()->share('categories', $this->getCategories());
        view()->share('countries', $this->getCurrencies());

        return view('frontend.landing', compact('slider', 'egyptProducts', 'russiaProducts'));
    }

    /**
     * Get the slider products
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getSliderProducts()
    {
        return Slider::all()->where('active', 'yes');
    }

    /**
     * Get egypt products
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getEgyptProducts()
    {
        $egypt = DB::table('countries')
                    ->where('code', 'like', 'EG')
                    ->select('countries.id')
                    ->first();

        return DB::table('products')
                    ->join('product_translations', function($query) {
                        $query->on( 'products.id', '=', 'product_translations.product_id')
                            ->where('product_translations.locale', '=', app()->getLocale());
                    })
                    ->join('currencies', function($query) {
                        $query->on('currencies.id', '=', 'products.currency_id');
                    })
                    ->select(
                        'products.*',
                        'currencies.code as currency_name',
                        'product_translations.name as name',
                        'product_translations.description as description',
                        'product_translations.shipping_info as shipping_info'
                    )
                    ->orderBy('viewed', 'desc')
                    ->where('country_id', $egypt->id)
                    ->where('deleted_at', null)
                    ->take(6)
                    ->groupBy(
                        'products.id',
                        'currencies.code',
                        'product_translations.name',
                        'product_translations.description',
                        'product_translations.shipping_info'
                    )
                    ->get();
    }

    /**
     * Get russia products
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getRussiaProducts()
    {
        $russia = DB::table('countries')
                    ->where('code', 'like', 'RU')
                    ->select('countries.id')
                    ->first();

        return DB::table('products')
                    ->join('product_translations', function($query) {
                        $query->on( 'products.id', '=', 'product_translations.product_id')
                            ->where('product_translations.locale', '=', app()->getLocale());
                    })
                    ->join('currencies', function($query) {
                        $query->on('currencies.id', '=', 'products.currency_id');
                    })
                    ->select(
                        'products.*',
                        'currencies.code as currency_name',
                        'product_translations.name as name',
                        'product_translations.description as description',
                        'product_translations.shipping_info as shipping_info'
                    )
                    ->orderBy('viewed', 'desc')
                    ->where('country_id', $russia->id)
                    ->where('deleted_at', null)
                    ->take(6)
                    ->groupBy(
                        'products.id',
                        'currencies.code',
                        'product_translations.name',
                        'product_translations.description',
                        'product_translations.shipping_info'
                    )
                    ->get();
    }
}
