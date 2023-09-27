<?php

namespace App\Observers;

use App\Models\HouseImageModel;

class HouseImageObserver
{
    /**
     * Handle the HouseImageModel "created" event.
     *
     * @param  \App\Models\HouseImageModel  $houseImageModel
     * @return void
     */
    public function created(HouseImageModel $houseImageModel)
    {

    }

    /**
     * Handle the HouseImageModel "updated" event.
     *
     * @param  \App\Models\HouseImageModel  $houseImageModel
     * @return void
     */
    public function updated(HouseImageModel $houseImageModel)
    {



    }

    /**
     * Handle the HouseImageModel "deleted" event.
     *
     * @param  \App\Models\HouseImageModel  $houseImageModel
     * @return void
     */
    public function deleted(HouseImageModel $houseImageModel)
    {
        //
    }

    /**
     * Handle the HouseImageModel "restored" event.
     *
     * @param  \App\Models\HouseImageModel  $houseImageModel
     * @return void
     */
    public function restored(HouseImageModel $houseImageModel)
    {
        //
    }

    /**
     * Handle the HouseImageModel "force deleted" event.
     *
     * @param  \App\Models\HouseImageModel  $houseImageModel
     * @return void
     */
    public function forceDeleted(HouseImageModel $houseImageModel)
    {
        //
    }
}
