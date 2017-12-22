<?php

namespace App\Http\Controllers\Release;

use App\Link;
use App\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Get links related to the given release
     *
     * @param Release $release
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Release $release)
    {
        $links = Link::where('release_id', $release->id)->get();

        return response()->json([
            'data' => $links
        ], 200);
    }

    /**
     * Store a new link for the given release
     *
     * @param Request $request
     * @param Release $release
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Release $release)
    {
        $link = Link::create([
            'release_id' => $release->id,
            'source_id' => $request->source_id,
            'url' => $request->url
        ]);

        return response()->json([
            'data' => [
                'id' => $link->id
            ]
        ], 200);
    }

    /**
     * Update a link
     *
     * @param Request $request
     * @param Link $link
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Link $link)
    {
        $link->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }

    /**
     * Delete a link from a release
     *
     * @param Link $link
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
