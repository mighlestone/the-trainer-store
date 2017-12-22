<?php

namespace App\Http\Controllers\Shoe;

use App\Colour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColourController extends Controller
{
    /**
     * Return a list of all the saved colours
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $colours = Colour::all();

        return response()->json([
            'data' => $colours
        ], 200);
    }

    /**
     * Create a new colour
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Colour::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Update a colour
     *
     * @param Request $request
     * @param Colour $colour
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Colour $colour)
    {
        $colour->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Delete a colour
     *
     * @param Colour $colour
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Colour $colour)
    {
        $colour->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
