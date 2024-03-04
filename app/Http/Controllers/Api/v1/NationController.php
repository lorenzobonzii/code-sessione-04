<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Nation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NationController extends Controller
{
    /**
     * Display a listing of the Nation.
     */
    public function index()
    {
        if(Gate::allows("read")){
            return Nation::all();
        } else {
            abort(403, "PERMISSION DENIED");
        }
    }

    /**
     * Store a newly created Nation.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified Nation.
     */
    public function show(Nation $nation)
    {
        //
    }

    /**
     * Update the specified Nation.
     */
    public function update(Request $request, Nation $nation)
    {
        //
    }

    /**
     * Remove the specified Nation.
     */
    public function destroy(Nation $nation)
    {
        //
    }
}
