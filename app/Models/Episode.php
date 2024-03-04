<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        "titolo",
        "ordine",
        "durata",
        "copertina",
        "descrizione",
        "season_id",
        "created_at",
        "updated_at",
    ];

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
