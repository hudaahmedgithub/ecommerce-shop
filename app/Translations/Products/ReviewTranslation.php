<?php

namespace App\Translations\Products;

use Illuminate\Database\Eloquent\Model;

class ReviewTranslation extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'shipping_info'
    ];

    public $timestamps = false;
}