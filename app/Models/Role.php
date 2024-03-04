<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "created_at",
        "updated_at",
    ];

    public function capabilities(){
        return $this->belongsToMany(Capability::class);
    }
}
