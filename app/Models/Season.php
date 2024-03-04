<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        "titolo",
        "ordine",
        "anno",
        "trama",
        "serie_id",
        "created_at",
        "updated_at",
    ];

    public function episodes(){
        return $this->hasMany(Episode::class);
    }
    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
