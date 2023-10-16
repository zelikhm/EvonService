<?php

namespace App\Console\Commands;

use App\Models\FlatImageModel;
use App\Models\HouseImageModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class WaterMarkForHousesImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:watermark_for_houses';

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
        $images = HouseImageModel::where('resize', 0)->get();

        foreach ($images as $image_info) {

            $image = Image::make('public/storage/buffer/' . $image_info->file);
            $image->insert('public/images/watermark.png');
            $image->heighten(420);

            $image1 = Image::make('public/storage/buffer/' . $image_info->file);
            $image1->resize(800, 420);
            $image1->blur(50);
            $image1->insert($image, 'center');

            $image1->save('public/storage/images/' . $image_info->file, 100);

            $http = Http::post(env('SERVICE_URL'), [
                'type' => 1,
                'image' => '/storage/images/' . $image_info->file,
                'id' => $image_info->image_id
            ]);

            unlink('public/storage/buffer/' . $image_info->file);

            $image_info->resize = 1;
            $image_info->save();
        }

        info('good update houses: ' . count($images));
    }
}
