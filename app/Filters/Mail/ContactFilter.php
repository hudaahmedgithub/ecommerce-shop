<?php

namespace App\Filters\Mail;

use Illuminate\Database\Eloquent\Model;

class ContactFilter extends Model
{
    /**
     * Set the ContactFilter's name
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sanitizeString($value)[0];
    }

    /**
     * Set the ContactFilter's email
     *
     * @param  string $value
     * @return string
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = sanitizeEmail($value)[0];
    }

    /**
     * Set the ContactFilter's phone
     *
     * @param  string $value
     * @return string
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = sanitizeString($value)[0];
    }

    /**
     * Set the ContactFilter's message
     *
     * @param  string $value
     * @return string
     */
    public function setMessageAttribute($value)
    {
        $this->attributes['message'] = sanitizeString($value)[0];
    }
}
