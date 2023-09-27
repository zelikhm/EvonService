<?php

namespace App\Console\Commands;

use App\Models\HouseImageModel;
use App\Models\MainHouseImage;
use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class WaterMarkforMainHouseImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:watermark_for_main_house_image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $images = MainHouseImage::where('isResize', 0)->get();

        foreach ($images as $image_info) {

            $image = Image::make('public/storage/buffer/' . $image_info->image);
            $image->insert('public/images/watermark.png');
            $image->heighten(420);

            $image->save('public/storage/images/houses/' . $image_info->image, 100);

            unlink('public/storage/buffer/' . $image_info->image);

            $image_info->resize = 1;
            $image_info->save();

        }

        info('good update houses: ' . count($images));
    }
}
