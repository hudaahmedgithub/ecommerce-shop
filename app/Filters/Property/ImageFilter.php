<?php

namespace App\Filters\Property;

use Illuminate\Database\Eloquent\Model;

class ImageFilter extends Model
{
    /**
     * Set the Images's Path
     *
     * @param  string $value
     * @return string
     */
    public function setPathAttribute($value)
    {
        $this->attributes['path'] = sanitizeString($value)[0];
    }

    /**
     * Set the Images's Property Id
     *
     * @param  int $value
     * @return int
     */
    public function setProperyIdAttribute($value)
    {
        $this->attributes['propert_id'] = intval($value);
    }
}