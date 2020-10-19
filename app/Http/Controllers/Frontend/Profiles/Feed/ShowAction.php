<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Profiles\Feed;

use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\FeedItem;
use App\Models\Profile;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, Profile $profile, Feed $feed)
    {
        if (! $profile->active && ! $feed->approved) {
            abort(404);
        }

        $items = FeedItem::where('feed_id', $feed->id)->paginate();

        return view('frontend.profiles.feeds.show', compact('profile', 'feed', 'items'));
    }
}
