<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * save method
     * @param Request $request
     * @param ImageService $imageService
     * @return \Illuminate\Http\JsonResponse
     */

    public function save(Request $request, ImageService $imageService)
    {

        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        $file = $request->file('image');

        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }

        return response()->json($imageService->saveImage($request), 200);
    } //end

}
