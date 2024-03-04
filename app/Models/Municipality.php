<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        "comune",
        "regione",
        "provincia",
        "sigla",
        "codice_belfiore",
        "cap",
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

}
