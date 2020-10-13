<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Profiles;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, Profile $profile)
    {
        if (! $profile->active) {
            abort(404);
        }

        $profile->load(['user']);

        return view('frontend.profiles.show', compact('profile'));
    }
}
