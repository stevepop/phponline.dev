<?php declare(strict_types=1);

namespace App\Console\Commands\Podcasts;

use App\Actions\Podcasts\PublishPodcastAction;
use App\Models\Podcast;
use Illuminate\Console\Command;

class PublishScheduledPodcastsCommand extends Command
{
    protected $signature = 'podcasts:publish-scheduled';

    protected $description = 'Publish all scheduled podcasts.';

    public function handle(PublishPodcastAction $action)
    {
        Podcast::scheduled()->get()
            ->reject(fn(Podcast $podcast) => $podcast->publish_date->isFuture())
            ->each(fn(Podcast $podcast) => $action->execute($podcast));
    }
}
