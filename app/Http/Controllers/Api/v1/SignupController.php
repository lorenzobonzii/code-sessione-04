<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    /**
     * Register a newly created User.
     * @unauthenticated
     */
    public function signup(SignupStoreRequest $request)
    {
        $dati = $request->validated();
        $film = User::create($dati);
        return new UserResource($film);
    }
}
