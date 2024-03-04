<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "continente",
        "iso",
        "iso3",
        "prefisso_telefonico",
    ];

    public function films(){
        return $this->hasMany(Film::class);
    }
    public function series(){
        return $this->hasMany(Serie::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }

}
