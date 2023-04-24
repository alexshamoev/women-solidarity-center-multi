<?php

namespace App\Observers;

use App\Models\AnimatedHeaderStep0;
use Illuminate\Support\Facades\Storage;

class AnimatedHeaderStep0Observer
{
    /**
     * Handle the AnimatedHeaderStep0 "created" event.
     *
     * @param  \App\Models\AnimatedHeaderStep0  $animatedHeaderStep0
     * @return void
     */
    public function created(AnimatedHeaderStep0 $animatedHeaderStep0)
    {
        //
    }

    /**
     * Handle the AnimatedHeaderStep0 "updated" event.
     *
     * @param  \App\Models\AnimatedHeaderStep0  $animatedHeaderStep0
     * @return void
     */
    public function updated(AnimatedHeaderStep0 $animatedHeaderStep0)
    {
        //
    }

    /**
     * Handle the AnimatedHeaderStep0 "deleted" event.
     *
     * @param  \App\Models\AnimatedHeaderStep0  $animatedHeaderStep0
     * @return void
     */
    public function deleted(AnimatedHeaderStep0 $animatedHeaderStep0)
    {
        $file = 'public/images/modules/animated_header/78/'.$animatedHeaderStep0->id.'.jpg';
        
        if(Storage::exists($file)) {
            Storage::delete($file);
        }
    }

    /**
     * Handle the AnimatedHeaderStep0 "restored" event.
     *
     * @param  \App\Models\AnimatedHeaderStep0  $animatedHeaderStep0
     * @return void
     */
    public function restored(AnimatedHeaderStep0 $animatedHeaderStep0)
    {
        //
    }

    /**
     * Handle the AnimatedHeaderStep0 "force deleted" event.
     *
     * @param  \App\Models\AnimatedHeaderStep0  $animatedHeaderStep0
     * @return void
     */
    public function forceDeleted(AnimatedHeaderStep0 $animatedHeaderStep0)
    {
        //
    }
}
