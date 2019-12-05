<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        $this->attributes['path'] = $value;
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
