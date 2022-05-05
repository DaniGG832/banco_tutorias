<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $fillable = ['nombre', 'dni'];

    public function cuentas(){

        return $this->belongsToMany(Cuenta::class,'titulares');
    }
    
}
