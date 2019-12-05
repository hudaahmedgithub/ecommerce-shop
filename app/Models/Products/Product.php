<?php

namespace App\Models\Products;

use App\Filters\Products\ProductFilter;
use App\Models\Products\Category;
use App\Models\Products\Image;

use App\Models\Products\Reservation;
use App\Models\Utilities\Country;
use App\Models\Utilities\Currency;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * 1. Get the rate of the product from the reviews table
 * 5. Check if the products is available by count the sales and the quantity
 */
class Product extends ProductFilter implements TranslatableContract
{
    use Translatable, SoftDeletes;

    /**
     * The Translation Model that translates the translated attributes
     *
     * @var string
     */
    public $translationModel = 'App\Translations\Products\ProductTranslation';

    /**
     * The attributes that will be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'name', 'description', 'shipping_info'
    ];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'country_id', 'currency_id', 'price', 'color', 'quantity', 'featured_image', 'viewed'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the images related to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get the images related to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the reservations related to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    /**
     * Get the category for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the currency for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the country for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Check whether the product is in stock or out of stock
     *
     * @return bool
     */
    public function checkStockQuantity()
    {
        $reservations   = $this->reservations->count();
        $quantity       = $this->quantity;

        if ($reservations >= $quantity)
            return false;

        return true;
    }
}
