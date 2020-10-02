<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\UserGroups;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, UserGroup $userGroup)
    {
        return view('frontend.user-groups.show', compact('userGroup'));
    }
}
