<?php

namespace App\Models\Products;

use App\Filters\Property\ImageFilter;
use App\Models\Products\Product;

class Image extends ImageFilter
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'path', 'product_id'
    ];

    /**
     * Get the product for the image
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
