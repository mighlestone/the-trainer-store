<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoe::all();

        return response()->json([
            'data' => $shoes
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
        $shoe = Shoe::create([
            'user_id' => $request->user()->id,
            'barcode_number' => $request->barcode_number,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'model_description' => $request->model_description,
            'colour_id' => $request->colour_id,
            'collaboration' => $request->collaboration,
            'gender' => $request->gender,
            'shoe_category_id' => $request->shoe_category_id,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image' => $request->image
        ]);

        return response()->json([
            'data' => [
                'id' => $shoe->id
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Shoe $shoe)
    {
        return response()->json([
            'data' => $shoe
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoe $shoe)
    {
        $shoe->update([
            'barcode_number' => $request->barcode_number,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'model_description' => $request->model_description,
            'colour_id' => $request->colour_id,
            'collaboration' => $request->collaboration,
            'gender' => $request->gender,
            'shoe_category_id' => $request->shoe_category_id,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image' => $request->image
        ]);

        return response()->json([
            'data' => [
                'id' => $shoe->id
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoe $shoe)
    {
        $shoe->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
