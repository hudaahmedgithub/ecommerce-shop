<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Products\SliderFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends SliderFilter implements TranslatableContract
{

    use Translatable;

    /**
     * The Translation Model that translates the translated attributes
     *
     * @var string
     */
    public $translationModel = 'App\Translations\Products\SliderTranslation';

    /**
     * The attributes that will be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'name', 'description',
    ];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'image', 'url', 'active',
    ];
}
