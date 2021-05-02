<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Una propiedad tiene un propietarios
    public function owner() {
        return $this->belongsTo(Owner::class);
    }
}
