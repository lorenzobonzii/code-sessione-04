<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "role_id",
        "nome",
        "cognome",
        "sesso",
        "cf",
        "indirizzo",
        "nation_id",
        "municipality_id",
        "email",
        "telefono",
        "user",
        "password",
        "sale",
        "secret_jwt",
        "stato",
        "created_at",
        "updated_at"
    ];
    protected $hidden = [
        "password",
        "sale",
        "secret_jwt"
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function nation(){
        return $this->belongsTo(Nation::class);
    }
    public function municipality(){
        return $this->belongsTo(Municipality::class);
    }

    public static function esisteUtente($user){
        $temp = DB::table('users')->where('user', '=', $user)->select('id')->get()->count();
        return ($temp > 0) ? true : false;
    }

}
