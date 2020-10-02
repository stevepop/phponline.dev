<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, Article $article)
    {
        $article->load(['category', 'tags', 'submittedByUser']);

        return view('frontend.articles.show', compact('article'));
    }
}
