<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexAction extends Controller
{
    public function __invoke(Request $request)
    {
        $articles = Article::published()->latest('publish_date')->paginate();

        return view('frontend.articles.index', compact('articles'));
    }
}
