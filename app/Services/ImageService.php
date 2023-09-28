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

    public function saveImageForHouse($data)
    {
        return $data->imageName;

        $data->image->move(public_path('/storage/buffer'), $data->imageName);

        HouseImageModel::create([
            'image_id' => $data->image_id,
            'file' => $data->imageName,
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

        $data->image->move(public_path('/storage/buffer'), $data->imageName);
        FlatImageModel::create([
            'image_id' => $data->image_id,
            'file' => $data->imageName,
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

        $data->image->move(public_path('/storage/buffer'), $data->imageName);

        MainHouseImage::create([
            'house_id' => $data->image_id,
            'image' => $data->imageName,
        ]);

        return true;

    } //end

    /**
     * delete main image for house
     * @param $data
     * @return bool
     */

    public function deleteMain($data): bool
    {
        MainHouseImage::where('image', $data->image)->delete();
    } //end

    /**
     * delete image for house
     * @param $data
     * @return bool
     */

    public function deleteHouse($data): bool
    {
        HouseImageModel::where('file', $data->image)->delete();
    } //end

    /**
     * delete image for flat
     * @param $data
     * @return bool
     */

    public function deleteFlat($data): bool
    {
        FlatImageModel::where('file', $data->image)->delete();
    } //end
}
