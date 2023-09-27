<?php


namespace App\Services;

use App\Models\FlatImageModel;
use App\Models\HouseImageModel;
use App\Models\MainHouseImage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ImageService
{

    /**
     * @param object $data
     * @param int type
     * @param int image_id
     * @param image image
     * @return bool
     */

    public function saveImageForHouse($data): bool
    {

        $imageName = time() . '.' . $data->image->getClientOriginalName();

        $data->image->move(public_path('/storage/buffer'), $imageName);

        HouseImageModel::create([
            'image_id' => $data->image_id,
            'file' => $imageName,
        ]);

        return true;

    } //end

    /**
     * save image for flat
     * @param $data
     * @return bool
     */

    public function saveImageForFlat($data): bool
    {

        $imageName = time() . '.' . $data->image->getClientOriginalName();

        $data->image->move(public_path('/storage/buffer'), $imageName);
        FlatImageModel::create([
            'image_id' => $data->image_id,
            'file' => $imageName,
        ]);

        return true;
    } //end

    /**
     * save main image for house
     * @param $data
     * @return bool
     */

    public function saveImageForMainHouseImage($data): bool
    {

        $imageName = time() . '.' . $data->image->getClientOriginalName();

        $data->image->move(public_path('/storage/buffer'), $imageName);

        MainHouseImage::create([
            'house_id' => $data->image_id,
            'image' => $imageName,
        ]);

        return true;

    } //end
}
