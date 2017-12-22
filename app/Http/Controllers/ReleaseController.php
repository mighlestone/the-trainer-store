<?php

namespace App\Http\Controllers;

use App\Release;
use App\Shoe;
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
            'data' => [
                'id' => $release->id
            ]
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
            'data' => [
                'id' => $release->id
            ]
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
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Convert a release into a shoe
     *
     * @param Release $release
     * @return \Illuminate\Http\JsonResponse
     */
    public function convert(Release $release)
    {
        $shoe = new Shoe();

        $shoe->user_id = auth()->id();
        $shoe->brand_id = $release->brand_id;
        $shoe->model_id = $release->model_id;
        $shoe->model_description = $release->model_description;
        $shoe->colour_id = $release->colour_id;
        $shoe->collaboration = $release->collaboration;
        $shoe->gender = $$release->gender;
        $shoe->shoe_category_id = $release->shoe_category_id;
        $shoe->price = $release->price;
        $shoe->image = $release->image;
        $shoe->stock_quantity = $release->known_quantity;
        $shoe->save();

        return response()->json([
            'data' => [
                'id' => $shoe->id
            ]
        ], 200);
    }
}
