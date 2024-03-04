<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Municipality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the Municipality.
     */
    public function index()
    {
        if(Gate::allows("read")){
            return Municipality::all();
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Store a newly created Municipality.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified Municipality.
     */
    public function show(Municipality $municipality)
    {
        //
    }

    /**
     * Update the specified Municipality.
     */
    public function update(Request $request, Municipality $municipality)
    {
        //
    }

    /**
     * Remove the specified Municipality.
     */
    public function destroy(Municipality $municipality)
    {
        //
    }
}
