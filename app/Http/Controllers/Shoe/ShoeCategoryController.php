<?php

namespace App\Http\Controllers\Shoe;

use App\ShoeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoeCategoryController extends Controller
{
    /**
     * Return a list of all the shoe categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = ShoeCategory::all();

        return response()->json([
            'data' => $categories
        ], 200);
    }

    /**
     * Create a new shoe category
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        ShoeCategory::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Update a category
     *
     * @param Request $request
     * @param ShoeCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ShoeCategory $category)
    {
        $category->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Delete a category
     *
     * @param ShoeCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ShoeCategory $category)
    {
        $category->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
