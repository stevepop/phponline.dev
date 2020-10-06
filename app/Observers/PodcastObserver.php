<?php declare(strict_types=1);

namespace App\Observers;

use App\Jobs\Podcasts\FetchPodcastData;
use App\Models\Podcast;

class PodcastObserver
{
    /**
     * Handle the podcast "created" event.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return void
     */
    public function created(Podcast $podcast)
    {
        FetchPodcastData::dispatch($podcast);
    }

    /**
     * Handle the podcast "updated" event.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return void
     */
    public function updated(Podcast $podcast)
    {
        //
    }

    /**
     * Handle the podcast "deleted" event.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return void
     */
    public function deleted(Podcast $podcast)
    {
        //
    }

    /**
     * Handle the podcast "restored" event.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return void
     */
    public function restored(Podcast $podcast)
    {
        //
    }

    /**
     * Handle the podcast "force deleted" event.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return void
     */
    public function forceDeleted(Podcast $podcast)
    {
        //
    }
}
