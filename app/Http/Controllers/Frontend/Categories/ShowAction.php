<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowAction extends Controller
{
    public function __invoke(Request $request, Category $category)
    {
        $articles = $category->articles()->paginate();

        return view('frontend.categories.show', compact('category', 'articles'));
    }
}
