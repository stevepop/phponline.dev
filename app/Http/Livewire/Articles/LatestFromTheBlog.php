<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class LatestFromTheBlog extends Component
{
    public Collection $articles;

    public function mount()
    {
        $this->articles = Article::with(['tags'])->published()->whereHas('category', function (Builder $builder) {
            $builder->where('slug', 'tutorials');
        })->latest('publish_date')->take(4)->get();
    }

    public function render()
    {
        return view('livewire.articles.latest-from-the-blog');
    }
}
