<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\UserGroups\Events;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request, UserGroup $userGroup)
    {
        $events = $userGroup->events()->paginate();

        return view('frontend.user-groups.events.index', compact('userGroup', 'events'));
    }
}
