<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SliderFilter extends Model
{
    /**
     * Set the slider image
     * 
     * @param  object $value
     * @return string
     */
    public function setImageAttribute($value)
    {
        $request = Request();
        $uplPath = 'public/sliders/';
        
        if($request->method() == 'PATCH') {
            $oldImage = $this->image;
            $image = uploadImage($value, $uplPath, true, $oldImage);
        }
        
        if($request->method() == 'POST') {
            $image = uploadImage($value, $uplPath);
        }

        $this->attributes['image'] = $image ?? NULL;
    }

    /**
     * Set the slider Name
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sanitizeString($value)[0];
    }

    /**
     * Set the slider Desctiption
     *
     * @param  string $value
     * @return string
     */
    public function setDesctiptionAttribute($value)
    {
        $this->attributes['desctiption'] = sanitizeString($value)[0];
    }


    /**
     * Set the slider Url
     *
     * @param  string $value
     * @return string
     */
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = sanitizeUrl($value)[0];
    }

    /**
     * Set the slider Active
     *
     * @param  string $value
     * @return string
     */
    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = sanitizeString($value)[0];
    }

}