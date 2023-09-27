<?php

namespace App\Console\Commands;

use App\Events\WaterMark;
use App\Models\FlatImageModel;
use App\Services\ImageService;
use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class WaterMarkForImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:watermark_flats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'added watermark for images and resize';

    /**
     * Execute the console command.
     *
     * @param ImageService $imageService
     * @return void
     */
    public function handle(ImageService $imageService)
    {

        $images = FlatImageModel::where('resize', 0)->get();

        foreach ($images as $image_info) {

            $image = Image::make('public/storage/buffer/' . $image_info->file);
            $image->insert('public/images/watermark.png');
            $image->heighten(420);

            $image->save('public/storage/images/flats/' . $image_info->file, 100);

            unlink('public/storage/buffer/' . $image_info->file);

            $image_info->resize = 1;
            $image_info->save();
        }

        info('good update flats: ' . count($images));

    }
}
