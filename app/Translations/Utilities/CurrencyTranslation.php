<?php

namespace App\Translations\Utilities;

use Illuminate\Database\Eloquent\Model;

class CurrencyTranslation extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
