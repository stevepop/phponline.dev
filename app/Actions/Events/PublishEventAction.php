<?php declare(strict_types=1);

namespace App\Actions\Events;

use App\Models\Event;

class PublishEventAction
{
    public function execute(Event $event)
    {
        $event->published = true;

        if (! $event->publish_date) {
            $event->publish_date = now();
        }

        $event->save();

        // Send tweet

        // Clear Cache
    }
}
