<?php

namespace App\Http\Controllers\Shoe;

use App\ShoeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoeModelController extends Controller
{
    /**
     * Return a list of all shoe models
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sources = ShoeModel::all();

        return response()->json([
            'data' => $sources
        ], 200);
    }

    /**
     * Create a new shoe model
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        ShoeModel::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Update a shoe model
     *
     * @param Request $request
     * @param ShoeModel $model
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ShoeModel $model)
    {
        $model->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Delete a category
     *
     * @param ShoeModel $model
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ShoeModel $model)
    {
        $model->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
