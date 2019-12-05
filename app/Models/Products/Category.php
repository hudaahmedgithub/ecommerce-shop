<?php

namespace App\Models\Products;

use App\Models\Products\Product;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use Translatable, SoftDeletes;

    /**
     * The Translation Model that translates the translated attributes
     *
     * @var string
     */
    public $translationModel = 'App\Translations\Products\CategoryTranslation';

    /**
     * The attributes that will be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'name', 'description'
    ];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'active'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the products related to the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
