<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CouponUser extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'coupon_id',
    ];
}
