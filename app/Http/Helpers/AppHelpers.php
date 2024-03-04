<?php

namespace App\Http\Helpers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// use Illuminate\Support\Arr;

class AppHelpers {
    public static function HelperNewRules($rules){

        /*
        $newRules = array();
        foreach ($rules as $key => $value){
            $newRules[$key] = str_replace("required|", "", $value);
        }
        */

        /*
        $newRules = Arr::map($rules, function($value){
            return str_replace("required|", "", $value);
        });
        */

        $newRules = array_map(function($value){
            return str_replace("required|", "", $value);
        }, $rules);

        return $newRules;
    }

    public static function rispostaCustom($dati, $msg = null, $err = null){
        $response = array();
        $response['data']=$dati;
        if ($msg!=null) $response['message']=$msg;
        if ($err!=null) $response['error']=$err;
        return $response;
    }

    public static function nascondiPassword($password, $sale){
        return hash("sha1", $password.$sale);
    }

    public static function creaTokenSessione($id_user, $secret_jwt, $usa_da = null, $scade = null){
        $max_time = 15 * 24 * 60 * 60;
        $user = User::where("id", $id_user)->first();
        $t = time();
        $nbf = ($usa_da == null) ? $t : $usa_da;
        $exp = ($scade == null) ? $nbf + $max_time : $scade;
        $arr = array(
            "iss" => "https://code.lorenzobonzi.it",
            "aud" => null,
            "iat" => $t,
            "nbf" => $nbf,
            "exp" => $exp,
            "data" => array(
                "user_id" => $user->id,
                "stato" => $user->stato,
                "role_id" => $user->role_id,
                "nome" => trim($user->nome." ".$user->cognome)
            )
        );
        $token = JWT::encode($arr, $secret_jwt, "HS256");
        return $token;
    }
    public static function validaToken($token, $secret_jwt, $sessione){
        $payload = JWT::decode($token, new Key ($secret_jwt, "HS256"));
        if ($payload->iat <= $sessione->inizio_sessione)
            if ($payload->data->user_id == $sessione->user_id)
                return $payload;
        return null;
    }
}
