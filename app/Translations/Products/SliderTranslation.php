<?php

namespace App\Translations\Products;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public $timestamps = false;

}