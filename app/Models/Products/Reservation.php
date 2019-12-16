<?php

namespace App\Models\Products;

use App\Models\Products\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Reservation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'status','active', 'shipping_at', 'success_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the product for the reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product for the reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the product for the reservation
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProducts($id)
    {
        return DB::table('products')
                    ->join('product_reservation', function($query) {
                        $query->on( 'products.id', '=', 'product_reservation.product_id');
                    })
                    ->join('product_translations', function($query) {
                        $query->on( 'products.id', '=', 'product_translations.product_id')
                            ->where('product_translations.locale', '=', app()->getLocale());
                    })
                    ->join('currencies', function($query) {
                        $query->on('currencies.id', '=', 'products.currency_id');
                    })
                    ->select(
                        'product_reservation.*',
                        'product_reservation.quantity as productQuantity',
                        'products.*',
                        'currencies.code as currency_name',
                        'product_translations.name as name',
                        'product_translations.description as description',
                        'product_translations.shipping_info as shipping_info'
                    )
                    ->where('product_reservation.reservation_id', $id)
                    ->get();
    }


    /**
     * Get the reservation_info for the reservation
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function reservation_info($id)
    {
        return DB::table('reservations')
                    ->join('reservation_info', function($query) {
                        $query->on( 'reservations.id', '=', 'reservation_info.reservation_id');
                    })
                    ->select(
                        'reservation_info.*'
                    )
                    ->where('deleted_at', null)
                    ->where('reservation_info.id', $id)
                    ->get();
    } 
}
