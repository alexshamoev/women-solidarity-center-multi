<?php

namespace App\Observers;

use App\Models\PublicationsStep0;
use Illuminate\Support\Facades\Storage;

class PublicationsStep0Observer
{
    /**
     * Handle the PublicationsStep0 "created" event.
     *
     * @param  \App\Models\PublicationsStep0  $publicationsStep0
     * @return void
     */
    public function created(PublicationsStep0 $publicationsStep0)
    {
        //
    }

    /**
     * Handle the PublicationsStep0 "updated" event.
     *
     * @param  \App\Models\PublicationsStep0  $publicationsStep0
     * @return void
     */
    public function updated(PublicationsStep0 $publicationsStep0)
    {
        //
    }

    /**
     * Handle the PublicationsStep0 "deleted" event.
     *
     * @param  \App\Models\PublicationsStep0  $publicationsStep0
     * @return void
     */
    public function deleted(PublicationsStep0 $publicationsStep0)
    {
        $file = 'public/images/modules/publications/88/'.$publicationsStep0->id.'.jpg';

        if(Storage::exists($file)){
            Storage::delete($file);
        }

        $file = 'public/images/modules/publications/88/'.$publicationsStep0->id.'_preview.jpg';

        if(Storage::exists($file)){
            Storage::delete($file);
        }

        $file = 'public/images/modules/publications/88/meta_'.$publicationsStep0->id.'.jpg';

        if(Storage::exists($file)){
            Storage::delete($file);
        }
    }

    /**
     * Handle the PublicationsStep0 "restored" event.
     *
     * @param  \App\Models\PublicationsStep0  $publicationsStep0
     * @return void
     */
    public function restored(PublicationsStep0 $publicationsStep0)
    {
        //
    }

    /**
     * Handle the PublicationsStep0 "force deleted" event.
     *
     * @param  \App\Models\PublicationsStep0  $publicationsStep0
     * @return void
     */
    public function forceDeleted(PublicationsStep0 $publicationsStep0)
    {
        //
    }
}
