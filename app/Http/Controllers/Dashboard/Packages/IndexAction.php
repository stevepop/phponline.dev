<?php declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Packages;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard.packages.index');
    }
}
