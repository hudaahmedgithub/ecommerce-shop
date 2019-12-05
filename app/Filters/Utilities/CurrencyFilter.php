<?php

namespace App\Filters\Utilities;

use Illuminate\Database\Eloquent\Model;

class CurrencyFilter extends Model
{
    /**
     * Set the Currency's name
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sanitizeString($value)[0];
    }
}