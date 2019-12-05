<?php

namespace App\Translations\Products;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public $timestamps = false;
}
