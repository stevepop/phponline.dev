<?php declare(strict_types=1);

namespace App\Actions\Podcasts;

use App\Models\Podcast;

class PublishPodcastAction
{
    public function execute(Podcast $podcast)
    {
        $podcast->published = true;

        if (! $podcast->publish_date) {
            $podcast->publish_date = now();
        }

        $podcast->save();
    }
}
