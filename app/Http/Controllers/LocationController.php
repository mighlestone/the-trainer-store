<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Return a list of all the saved locations
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $locations = Location::all();

        return response()->json([
            'data' => $locations
        ], 200);
    }

    /**
     * Create a new location
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Location::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
