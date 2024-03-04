<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\AppHelpers;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Nation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     */
    public function index()
    {
        if(Gate::allows("read")){
            $risorsa = User::all();
            return new UserCollection($risorsa);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Store a newly created User.
     */
    public function store(UserStoreRequest $request)
    {
        if(Gate::allows("create")){
            $dati = $request->validated();
            $dati["password"] = sha1($dati["password"]);
            $user = User::create($dati);
            return new UserResource($user);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Display the specified User.
     */
    public function show(User $user)
    {
        if(Gate::allows("read")){
            $utente = Auth::getUser();
            if($utente->role_id==1 || $utente->role->nome=="Admin" || $utente->id==$user->id){
                return new UserResource($user);
            } else {
                abort(403, "ACCESS DENIED");
            }
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Update the specified User.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $utente = Auth::getUser();
        if(Gate::allows("edit") || $utente->role_id==1 || $utente->role->nome=="Admin" || $utente->id==$user->id){
            $dati = $request->validated();
            $user->fill($dati);
            $user->save();
            return new UserResource($user);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Remove the specified User.
     */
    public function destroy(User $user)
    {
        if(Gate::allows("delete")){
            $user->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }
}
