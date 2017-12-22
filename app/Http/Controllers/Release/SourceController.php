<?php

namespace App\Http\Controllers\Release;

use App\Source;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SourceController extends Controller
{
    /**
     * Return a list of all the sources
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sources = Source::all();

        return response()->json([
            'data' => $sources
        ], 200);
    }

    /**
     * Create a new source
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Source::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Update a source
     *
     * @param Request $request
     * @param Source $source
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Source $source)
    {
        $source->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Delete a source
     *
     * @param Source $source
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Source $source)
    {
        $source->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
