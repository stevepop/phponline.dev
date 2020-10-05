<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactPageAction extends Controller
{
    public function __invoke(Request $request)
    {
        return view('frontend.pages.contact');
    }
}
