<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\AppHelpers;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Verifies the credentials of the User.
     */
    public function login($user, $hash = null)
    {
        if ($hash == null){
            return LoginController::controlloUtente($user);
        } else {
            return LoginController::controlloPassword($user, $hash);
        }
    }

    /**
     * Verifies the username of the User.
     * @unauthenticated
     */
    public function controlloUtente($user){
        $sale = hash("sha1", trim(Str::random(200)));
        if(User::esisteUtente($user)){
            $user = User::where('user', $user)->first();
            $user->secret_jwt = hash("sha1", trim(Str::random(200)));
            $user->sale = $sale;
            $user->save();
            $dati = array("sale" => $sale);
        } else {
            $dati = abort(403, "USER NOT FOUND");
        }
        return AppHelpers::rispostaCustom($dati);
    }
    /**
     * Verifies the username and password of the User.
     * @unauthenticated
     */
    public function controlloPassword($user, $hash){
        if (User::esisteUtente($user)){
            $user = User::where('user', $user)->first();
            $secret_jwt = $user->secret_jwt;
            $password = $user->password;
            $sale = $user->sale;
            $password_nascosta = AppHelpers::nascondiPassword($password, $sale);
            if ($hash == $password_nascosta){
                $tk = AppHelpers::creaTokenSessione($user->id, $secret_jwt);
                Session::eliminaSessione($user->id);
                Session::aggiornaSessione($user->id, $tk);
                $dati = array("tk" => $tk);
                return AppHelpers::rispostaCustom($dati);
            } else {
                abort(403, "INVALID CREDENTIALS");
            }
        } else {
            abort(403, "USER NOT FOUND");
        }
    }
    public static function verificaToken($token){
        $rit = null;
        $sessione = Session::datiSessione($token);
        if ($sessione!=null){
            $inizio_sessione = $sessione->inizio_sessione;
            $durata_sessione = '1200000';
            $scadenza_sessione = $inizio_sessione + $durata_sessione;
            if (time()<$scadenza_sessione){
                $user = User::where('id', $sessione->user_id)->first();
                if($user!=null){
                    $secret_jwt = $user->secret_jwt;
                    $payload = AppHelpers::validaToken($token, $secret_jwt, $sessione);
                    if($payload!=null){
                        $rit = $payload;
                    } else {
                        abort(403, 'INVALID PAYLOAD TOKEN');
                    }
                } else {
                    abort(403, 'INVALID USER TOKEN');
                }
            } else {
                abort(403, 'SESSION EXPIRED');
            }
        } else {
            abort(403, 'INVALID SESSION');
        }
        return $rit;
    }
}
