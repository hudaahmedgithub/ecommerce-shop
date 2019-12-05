<?php

namespace App\Models\Admins;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Traits\LaratrustUserTrait;
use App\User;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;
	use LaratrustUserTrait;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    # Create Admin User
    public static function boot()
    {
        self::created(function($model){
            User::create([
                'id'       => $model->id,
                'name'     => $model->name,
                'email'    => $model->email,
                'password' => $model->password
            ]);
        });

        parent::boot();
    }
}
