<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\v1\LoginController;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(trim($_SERVER["HTTP_AUTHORIZATION"]))) {
            if (preg_match('/Bearer\s(\S+)/', trim($_SERVER["HTTP_AUTHORIZATION"]), $matches)) {
                $token = $matches[1];
            }
        }
        //$token = $_SERVER['PHP_AUTH_PW'];
        $payload = LoginController::verificaToken($token);
        if ($payload){
            $user = User::findOrFail($payload->data->user_id);
            if ($user->stato == 1){
                Auth::login($user);
                return $next($request);
            }
            else
                abort(403,'USER NOT ACTIVED');
        }
        else
            abort(403, 'INVALID TOKEN');
    }
}
