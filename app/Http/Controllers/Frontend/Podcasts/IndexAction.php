<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Podcasts;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        $podcasts = Podcast::published()->latest('publish_date')->paginate();

        return view('frontend.podcasts.index', compact('podcasts'));
    }
}
