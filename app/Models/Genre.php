<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "created_at",
        "updated_at",
    ];

    public function films(){
        return $this->belongsToMany(Film::class);
    }
    public function series(){
        return $this->belongsToMany(Serie::class);
    }
}
