<?php

namespace App\Models\Utilities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use App\Filters\Utilities\CurrencyFilter;

class Currency extends CurrencyFilter implements TranslatableContract
{
    use Translatable;

    /**
     * The Translation Model that translates the translated attributes
     *
     * @var string
     */
    public $translationModel = 'App\Translations\Utilities\CurrencyTranslation';

    /**
     * The attributes that will be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'name'
    ];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'active', 'code',
    ];

    /**
     * Set the Currency's code to be UpperCase
     *
     * @param  string $value
     * @return string
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }
}
