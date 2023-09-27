<?php

namespace App\Observers;

use App\Models\FlatImageModel;

class FlatImageObserver
{
    /**
     * Handle the FlatImageModel "created" event.
     *
     * @param  \App\Models\FlatImageModel  $flatImageModel
     * @return void
     */
    public function created(FlatImageModel $flatImageModel)
    {
        FlatImageModel::where('id', $flatImageModel->id)
            ->update([
                'image_id' => 2,
            ]);

        info(123);
    }

    /**
     * Handle the FlatImageModel "updated" event.
     *
     * @param  \App\Models\FlatImageModel  $flatImageModel
     * @return void
     */
    public function updated(FlatImageModel $flatImageModel)
    {
        info($flatImageModel->id . ' updated');
    }

    /**
     * Handle the FlatImageModel "deleted" event.
     *
     * @param  \App\Models\FlatImageModel  $flatImageModel
     * @return void
     */
    public function deleted(FlatImageModel $flatImageModel)
    {
        //
    }

    /**
     * Handle the FlatImageModel "restored" event.
     *
     * @param  \App\Models\FlatImageModel  $flatImageModel
     * @return void
     */
    public function restored(FlatImageModel $flatImageModel)
    {
        //
    }

    /**
     * Handle the FlatImageModel "force deleted" event.
     *
     * @param  \App\Models\FlatImageModel  $flatImageModel
     * @return void
     */
    public function forceDeleted(FlatImageModel $flatImageModel)
    {
        //
    }
}
