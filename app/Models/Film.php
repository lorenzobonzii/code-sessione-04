<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        "titolo",
        "regia",
        "anno",
        "durata",
        "lingua",
        "copertina",
        "anteprima",
        "trama",
        "nation_id",
        "created_at",
        "updated_at",
    ];

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function nation(){
        return $this->belongsTo(Nation::class);
    }
}
