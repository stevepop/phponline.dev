<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Articles\Levels;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IntermediateAction extends Controller
{
    public function __invoke(Request $request)
    {
        $level = Article::INTERMEDIATE;
        $articles = Article::published()->where('level',$level)->latest('publish_date')->paginate();

        return view('frontend.articles.level', compact('articles', 'level'));
    }
}
