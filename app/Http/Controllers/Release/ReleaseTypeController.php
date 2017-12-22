<?php

namespace App\Http\Controllers\Release;

use App\ReleaseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReleaseTypeController extends Controller
{
    /**
     * Return a list of all release types
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $types = ReleaseType::all();

        return response()->json([
            'data' => $types
        ], 200);
    }
}
