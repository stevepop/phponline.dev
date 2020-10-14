<?php declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Links;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard.links.index');
    }
}
