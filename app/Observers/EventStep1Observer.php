<?php

namespace App\Observers;

use App\Models\EventStep1;
use Illuminate\Support\Facades\Storage;

class EventStep1Observer
{
    /**
     * Handle the EventStep1 "created" event.
     *
     * @param  \App\Models\EventStep1  $eventStep1
     * @return void
     */
    public function created(EventStep1 $eventStep1)
    {
        //
    }

    /**
     * Handle the EventStep1 "updated" event.
     *
     * @param  \App\Models\EventStep1  $eventStep1
     * @return void
     */
    public function updated(EventStep1 $eventStep1)
    {
        //
    }

    /**
     * Handle the EventStep1 "deleted" event.
     *
     * @param  \App\Models\EventStep1  $eventStep1
     * @return void
     */
    public function deleted(EventStep1 $eventStep1)
    {
        $file = 'public/images/modules/event/96/'.$eventStep1->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        $file = 'public/images/modules/event/96/'.$eventStep1->id.'_preview.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }
    }

    /**
     * Handle the EventStep1 "restored" event.
     *
     * @param  \App\Models\EventStep1  $eventStep1
     * @return void
     */
    public function restored(EventStep1 $eventStep1)
    {
        //
    }

    /**
     * Handle the EventStep1 "force deleted" event.
     *
     * @param  \App\Models\EventStep1  $eventStep1
     * @return void
     */
    public function forceDeleted(EventStep1 $eventStep1)
    {
        //
    }
}
