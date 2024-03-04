<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "created_at",
        "updated_at",
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
