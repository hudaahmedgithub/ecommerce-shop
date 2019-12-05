<?php

namespace App\Models\Utilities;

use App\Filters\Mail\ContactFilter;

class Contact extends ContactFilter
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'message'
    ];
}
