<?php

namespace App\Filters\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersFilter extends Authenticatable
{
    /**
     * Set the user's image
     * 
     * @param  object $value
     * @return string
     */
    public function setImageAttribute($value)
    {
        $request = Request();
        $uplPath = 'public/profile/avatars';
        
        if($request->method() == 'PATCH') {
            # Get the old image to update it
            $oldImage = $this->image;
            # Update remove the old image and put instead of it the new image
            $image = uploadImage($value, $uplPath, true, $oldImage);
        }
        
        if($request->method() == 'POST') {
            # Upload the image to the selected path
            $image = uploadImage($value, $uplPath);
        }

        # Put the retuened path on the logo attribute
        $this->attributes['image'] = $image ?? NULL;
    }

    /**
     * Set the user's Name
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sanitizeString($value)[0];
    }

    /**
     * Set the user's Email
     *
     * @param  string $value
     * @return string
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = sanitizeEmail($value)[0];
    }

    /**
     * Set the user's address
     * 
     * @param  string $value
     * @return string
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = sanitizeString($value)[0];
    }

    /**
     * Set the user's phone
     * 
     * @param  Integer $value
     * @return Integer
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the user's about
     * 
     * @param  string $value
     * @return string
     */
    public function setAboutAttribute($value)
    {
        $this->attributes['about'] = sanitizeString($value)[0];
    }

    /**
     * Set the user's Age
     * 
     * @param  Integer $value
     * @return Integer
     */
    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = sanitizeInteger($value)[0];
    }


    /**
     * Set the user's city
     * 
     * @param  string $value
     * @return string
     */
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = sanitizeString($value)[0];
    }

    /**
     * Set the user's country
     * 
     * @param  string $value
     * @return string
     */
    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = sanitizeString($value)[0];
    }

    /**
     * Set the user's gender
     * 
     * @param  string $value
     * @return string
     */
    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = sanitizeString($value)[0];
    }

}