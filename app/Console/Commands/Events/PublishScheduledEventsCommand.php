<?php

namespace App\Console\Commands\Events;

use App\Actions\Events\PublishEventAction;
use App\Models\Event;
use Illuminate\Console\Command;

class PublishScheduledEventsCommand extends Command
{
    protected $signature = 'events:publish-scheduled';

    protected $description = 'Publish all scheduled events';

    public function handle(PublishEventAction $action)
    {
        Event::scheduled()->get()
            ->reject(fn(Event $event) => $event->publish_date->isFuture())
            ->each(fn(Event $event) => $action->execute($event));
    }
}
