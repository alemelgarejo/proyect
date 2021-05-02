<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Un cliente corresponde a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }

    //Un cliente puede realizar varias órdenes
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
