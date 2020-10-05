<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\UserGroups;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        $userGroups = UserGroup::published()->latest()->paginate();

        return view('frontend.user-groups.index', compact('userGroups'));
    }
}
