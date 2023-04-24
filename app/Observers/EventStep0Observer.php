<?php

namespace App\Observers;

use App\Models\EventStep0;
use Illuminate\Support\Facades\Storage;

class EventStep0Observer
{
    /**
     * Handle the EventStep0 "created" event.
     *
     * @param  \App\Models\EventStep0  $eventStep0
     * @return void
     */
    public function created(EventStep0 $eventStep0)
    {
        //
    }

    /**
     * Handle the EventStep0 "updated" event.
     *
     * @param  \App\Models\EventStep0  $eventStep0
     * @return void
     */
    public function updated(EventStep0 $eventStep0)
    {
        //
    }

    /**
     * Handle the EventStep0 "deleted" event.
     *
     * @param  \App\Models\EventStep0  $eventStep0
     * @return void
     */
    public function deleted(EventStep0 $eventStep0)
    {
        $file = 'public/images/modules/event/81/'.$eventStep0->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        $file = 'public/images/modules/event/81/'.$eventStep0->id.'_last_ev.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        $file = 'public/images/modules/event/81/meta_'.$eventStep0->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }
    }

    /**
     * Handle the EventStep0 "restored" event.
     *
     * @param  \App\Models\EventStep0  $eventStep0
     * @return void
     */
    public function restored(EventStep0 $eventStep0)
    {
        //
    }

    /**
     * Handle the EventStep0 "force deleted" event.
     *
     * @param  \App\Models\EventStep0  $eventStep0
     * @return void
     */
    public function forceDeleted(EventStep0 $eventStep0)
    {
        //
    }
}
