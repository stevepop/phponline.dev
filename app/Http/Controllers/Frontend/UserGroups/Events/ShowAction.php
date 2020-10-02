<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\UserGroups\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, UserGroup $userGroup, Event $event)
    {
        if (! $userGroup->events->contains($event->id)) {
            abort(404);
        }

        return view('frontend.user-groups.events.show', compact('userGroup', 'event'));
    }
}
