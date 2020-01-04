<?php

namespace App;

use App\Models\Products\Review;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\Users\UsersFilter;
use Illuminate\Notifications\Notifiable;
use App\Models\Products\Coupon;
use Spatie\Permission\Traits\HasRoles;
class User extends UsersFilter
{
    use Notifiable, SoftDeletes,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'image', 'phone', 
        'address', 'gender', 'about', 'age', 'city', 'country',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the user Coupons
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coupon()
    {
        return $this->belongsToMany('App\Coupon', 'coupon_users');
    }
    
}
