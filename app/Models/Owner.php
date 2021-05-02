<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Un propietario pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }
    //Un propietarios puede tener propiedades
    public function estates() {
        return $this->hasMany(Estate::class);
    }
}
