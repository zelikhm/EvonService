<?php

namespace App\Listeners;

use App\Events\WaterMark;
use App\Models\FlatImageModel;
use App\Services\ImageService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Facades\Image;

class GenerationWaterMark
{

    private $imageService;

    /**
     * Create the event listener.
     *
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\WaterMark $event
     * @param ImageService $imageService
     * @return void
     */
    public function handle(WaterMark $event)
    {

    }
}
