<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Un usuario tiene un rol
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //Un usuario puede encargarse de varios clientes
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    //Un usuario puede encargarse de varios propietarios
    public function owners()
    {
        return $this->hasMany(Owner::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
