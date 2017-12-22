<?php

namespace App\Http\Controllers\Shoe;

use App\Brand;
use App\ShoeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Return a list of all the brands
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $brands = Brand::all();

        return response()->json([
            'data' => $brands
        ], 200);
    }

    /**
     * Return a list of all the models associated with a brand
     *
     * @param Brand $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function models(Brand $brand)
    {
        $brandModels = ShoeModel::where('brand_id', $brand->id);

        return response()->json([
            'data' => $brandModels
        ], 200);
    }

    /**
     * Create a new brand entry
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Brand::create($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Update a brand
     *
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
