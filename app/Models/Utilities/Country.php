<?php

namespace App\Models\Utilities;

use App\Filters\Utilities\CountryFilter;
use App\Models\Products\Product;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model implements TranslatableContract
{
    use Translatable;

    /**
     * The Translation Model that translates the translated attributes
     *
     * @var string
     */
    public $translationModel = 'App\Translations\Utilities\CountryTranslation';

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
     * Set the country's code to be UpperCase
     *
     * @param  string $value
     * @return string
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    /**
     * Get the products related to the country
     *
     * @return \Illuminate\
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
