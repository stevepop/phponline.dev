<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateAction extends Controller
{
    public function __invoke(Request $request)
    {
        return view('frontend.articles.create');
    }
}
