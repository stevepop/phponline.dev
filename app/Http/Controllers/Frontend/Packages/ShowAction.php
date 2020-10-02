<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Packages;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, Package $package)
    {
        $package->load(['submittedByUser']);

        return view('frontend.packages.show', compact('package'));
    }
}
