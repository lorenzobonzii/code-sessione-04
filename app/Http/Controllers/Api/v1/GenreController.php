<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Http\Resources\GenreResource;
use App\Http\Resources\GenreCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GenreController extends Controller
{
    /**
     * Display a listing of the Genre.
     */
    public function index()
    {
        if(Gate::allows("read")){
            $risorsa = Genre::all();
            return new GenreCollection($risorsa);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Store a newly created Genre.
     */
    public function store(GenreStoreRequest $request)
    {
        if(Gate::allows("create")){
            $dati = $request->validated();
            $genre = Genre::create($dati);
            return new GenreResource($genre);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Display the specified Genre.
     */
    public function show(Genre $genre)
    {
        if(Gate::allows("read")){
            return new GenreResource($genre);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Update the specified Genre.
     */
    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        if(Gate::allows("edit")){
            $dati = $request->validated();
            $genre->fill($dati);
            $genre->save();
            return new GenreResource($genre);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Remove the specified Genre.
     */
    public function destroy(Genre $genre)
    {
        if(Gate::allows("delete")){
            $genre->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }
}
