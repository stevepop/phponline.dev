<?php declare(strict_types=1);

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class LatestFromTheBlog extends Component
{
    public Collection $articles;

    public function mount()
    {
        $this->articles = Article::with(['tags', 'submittedByUser', 'category'])
            ->published()->whereHas('category', function (Builder $builder) {
            $builder->where('slug', Category::NEWS);
        })->latest('publish_date')->take(3)->get();
    }

    public function render()
    {
        return view('livewire.articles.latest-from-the-blog');
    }
}
