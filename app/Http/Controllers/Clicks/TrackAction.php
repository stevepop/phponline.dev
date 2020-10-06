<?php declare(strict_types=1);

namespace App\Http\Controllers\Clicks;

use App\Http\Controllers\Controller;
use App\Models\Click;
use Illuminate\Http\Request;

class TrackAction extends Controller
{
    public function __invoke(Request $request, Click $click)
    {
        $click->update([
            'count' => ($click->count + 1)
        ]);

        return redirect($click->clickable->getClickableValue());
    }
}
