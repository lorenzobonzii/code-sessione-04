<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Film;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    /**
     * Display a listing of the Film.
     */
    public function index()
    {
        if(Gate::allows("read")){
            $risorsa = Film::all();
            return new FilmCollection($risorsa);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Store a newly created Film.
     */
    public function store(FilmStoreRequest $request)
    {
        if(Gate::allows("create")){
            $dati = $request->validated();
            $film = Film::create($dati);
            return new FilmResource($film);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Display the specified Film.
     */
    public function show(Film $film)
    {
        if(Gate::allows("read")){
            return new FilmResource($film);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Update the specified Film.
     */
    public function update(FilmUpdateRequest $request, Film $film)
    {
        if(Gate::allows("edit")){
            $dati = $request->validated();
            $film->fill($dati);
            $film->save();
            return new FilmResource($film);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Remove the specified Film.
     */
    public function destroy(Film $film)
    {
        if(Gate::allows("delete")){
            $film->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }
}
