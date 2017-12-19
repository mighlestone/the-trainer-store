<?php

namespace App\Http\Controllers;

use App\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = Release::all();

        return response()->json([
            'data' => $releases
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $release = Release::create([
            'release_type_id' => $request->release_type_id,
            'user_id' => $request->user()->id,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'colour_id' => $request->colour_id,
            'location_id' => $request->location_id,
            'gender' => $request->gender,
            'shoe_category_id' => $request->shoe_category_id,
            'price' => $request->price,
            'image' => $request->image,
            'known_quantity' => $request->known_quantity,
            'date' => $request->date
        ]);

        return response()->json([
            'data' => $release->id
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show(Release $release)
    {
        return response()->json([
            'data' => $release
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Release $release)
    {
        $release->update([
            'release_type_id' => $request->release_type_id,
            'user_id' => $request->user()->id,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'colour_id' => $request->colour_id,
            'location_id' => $request->location_id,
            'gender' => $request->gender,
            'shoe_category_id' => $request->shoe_category_id,
            'price' => $request->price,
            'image' => $request->image,
            'known_quantity' => $request->known_quantity,
            'date' => $request->date
        ]);

        return response()->json([
            'data' => $release->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        $release->delete();

        return response()->json([
            'data' => ''
        ], 200);
    }
}
