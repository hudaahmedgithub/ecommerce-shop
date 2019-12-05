<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Model;

class ProductTranslationFilter extends Model
{
    /**
     * Set the ProductTranslationFilter's name
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sanitizeString($value)[0];
    }

    /**
     * Set the ProductTranslationFilter's description
     *
     * @param  string $value
     * @return string
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = sanitizeString($value)[0];
    }

    /**
     * Set the ProductTranslationFilter's description
     *
     * @param  string $value
     * @return string
     */
    public function setShippingInfoAttribute($value)
    {
        $this->attributes['shipping_info'] = sanitizeString($value)[0];
    }
}
