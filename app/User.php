<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Province;
use App\Models\Regency;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles','store_name', 'categories_id','store_status',
        'address_one', 'address_two', 'provinces_id', 'regencies_id','zip_code', 'country','phone_number'
    ];

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

    public function provinces()
    {
        return $this->belongsTo(Province::class,'provinces_id','id');
    }

    public function regences()
    {
        return $this->belongsTo(Regency::class,'regencies_id','id');
    }
}
