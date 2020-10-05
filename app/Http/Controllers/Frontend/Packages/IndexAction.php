<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Packages;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        $packages = Package::published()->latest('publish_date')->paginate();

        return view('frontend.packages.index', compact('packages'));
    }
}
