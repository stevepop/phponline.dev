<?php declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::with([
            'articles',
            'podcasts',
            'packages',
            'links',
            'profile.feeds'
        ])->find(auth()->user()->id);

        return view('dashboard.index', compact('user'));
    }
}
