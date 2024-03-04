<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Serie;
use App\Http\Controllers\Controller;
use App\Http\Requests\SerieStoreRequest;
use App\Http\Requests\SerieUpdateRequest;
use App\Http\Resources\SerieCollection;
use App\Http\Resources\SerieResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SerieController extends Controller
{
    /**
     * Display a listing of the Serie.
     */
    public function index()
    {
        if(Gate::allows("read")){
            $risorsa = Serie::all();
            return new SerieCollection($risorsa);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Store a newly created Serie.
     */
    public function store(SerieStoreRequest $request)
    {
        if(Gate::allows("create")){
            $dati = $request->validated();
            $serie = Serie::create($dati);
            return new SerieResource($serie);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Display the specified Serie.
     */
    public function show(Serie $serie)
    {
        if(Gate::allows("read")){
            return new SerieResource($serie);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Update the specified Serie.
     */
    public function update(SerieUpdateRequest $request, Serie $serie)
    {
        if(Gate::allows("edit")){
            $dati = $request->validated();
            $serie->fill($dati);
            $serie->save();
            return new SerieResource($serie);
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Remove the specified Serie.
     */
    public function destroy(Serie $serie)
    {
        if(Gate::allows("delete")){
            $serie->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }
}
