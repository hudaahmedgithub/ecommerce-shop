<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products\Category;
use App\Models\Utilities\Country;
use Cart;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->middleware('cart');
    }

    /**
     * Get the categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getCategories()
    {
        return DB::table('categories')
                ->join('category_translations', function($query) {
                    $query->on('categories.id', '=', 'category_translations.category_id')
                        ->where('category_translations.locale', '=', app()->getLocale());
                })
                ->select(
                    'categories.*',
                    'category_translations.name'
                )
                ->where('active', 'yes')
                ->groupBy(
                    'categories.id',
                    'category_translations.name'
                )
                ->get();
    }

    /**
     * Get the currencies
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getCurrencies()
    {
        return DB::table('countries')
                ->join('country_translations', function($query) {
                    $query->on('countries.id', '=', 'country_translations.country_id')
                        ->where('country_translations.locale', '=', app()->getLocale());
                })
                ->select(
                    'countries.*',
                    'country_translations.name'
                )
                ->groupBy(
                    'countries.id',
                    'country_translations.name'
                )
                ->get();
    }
}
