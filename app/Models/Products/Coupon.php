<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'type', 'amount', 'code', 'duration', 'multi_times_count', 'expires_at'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

}
