<?php

namespace App\Http\Controllers\Shoe;

use App\ShoeSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoeSizeController extends Controller
{
    /**
     * Return a list of all the shoe sizes
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sizes = ShoeSize::all();

        return response()->json([
            'data' => $sizes
        ], 200);
    }

    /**
     * Create a new shoe size
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        ShoeSize::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Update shoe size
     *
     * @param Request $request
     * @param ShoeSize $size
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ShoeSize $size)
    {
        $size->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Delete shoe size
     *
     * @param ShoeSize $size
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ShoeSize $size)
    {
        $size->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
