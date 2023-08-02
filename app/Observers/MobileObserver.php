<?php

namespace App\Observers;

use App\Models\Mobile;

class MobileObserver
{
    /**
     * Handle the Mobile "created" event.
     */
    public function creating(Mobile $mobile): void
    {
//        dd('fsf');
//        $mobile->user_id = auth()->id();
    }

    /**
     * Handle the Mobile "updated" event.
     */
    public function updating(Mobile $mobile): void
    {
//        $mobile->user_id = auth()->id();
    }

    /**
     * Handle the Mobile "deleted" event.
     */
    public function deleted(Mobile $mobile): void
    {
        //
    }

    /**
     * Handle the Mobile "restored" event.
     */
    public function restored(Mobile $mobile): void
    {
        //
    }

    /**
     * Handle the Mobile "force deleted" event.
     */
    public function forceDeleted(Mobile $mobile): void
    {
        //
    }
}
