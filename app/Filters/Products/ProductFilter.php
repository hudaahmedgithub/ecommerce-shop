<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductFilter extends Model
{
    /**
     * Set the ProductFilter's price
     *
     * @param  string $value
     * @return string
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the ProductFilter's quantity
     *
     * @param  string $value
     * @return string
     */
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the ProductFilter's price
     *
     * @param  string $value
     * @return string
     */
    public function setFeaturedImageAttribute($value)
    {
        $request = Request();
        $uplPath = 'public/products/featured';

        if ($request->method() === 'PUT') {
            $oldImage = $this->featured_image;
            $image = uploadImage($value, $uplPath, true, $oldImage);
        }

        if ($request->method() === 'POST') {
            $image = uploadImage($value, $uplPath);
        }

        $this->attributes['featured_image'] = $image?? 'no_image';
    }
}
