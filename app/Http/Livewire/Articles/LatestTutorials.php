<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LatestTutorials extends Component
{
    public Collection $articles;

    public function mount()
    {
        $this->articles = Article::with(['tags', 'submittedByUser.profile', 'category'])
            ->published()->whereHas('category', function (Builder $builder) {
                $builder->where('slug', Category::TUTORIALS);
            })->latest('publish_date')->take(4)->get();
    }

    public function render()
    {
        return view('livewire.articles.latest-tutorials');
    }
}
