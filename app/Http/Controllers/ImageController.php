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

        info('connect true');

        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        $file = $request->file('image');

        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }

        if($request->type == 0) {
            return response()->json($imageService->saveImageForHouse($request), 200);
        } else if ($request->type == 1) {
            return response()->json($imageService->saveImageForFlat($request), 200);
        } else if ($request->type == 2) {
            return response()->json($imageService->saveImageForMainHouseImage($request), 200);
        }

    } //end

    /**
     * deleted photo
     * @param Request $request
     * @param ImageService $imageService
     * @return bool
     */

    public function delete(Request $request, ImageService $imageService) {
        if($request->type === 0) {
            return $imageService->deleteMain($request);
        } else if ($request->type === 1) {
            return $imageService->deleteHouse($request);
        } else if ($request->type === 2) {
            return $imageService->deleteFlat($request);
        }
    } //end

}
