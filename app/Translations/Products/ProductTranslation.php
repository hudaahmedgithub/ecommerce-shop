<?php

namespace App\Translations\Products;

use App\Filters\Products\ProductTranslationFilter;

class ProductTranslation extends ProductTranslationFilter
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'shipping_info'
    ];

    public $timestamps = false;
}
