<?php

namespace App\View\Components\Articles;

use App\Models\Article;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    /**
     * @var Article
     */
    public Article $article;

    /**
     * Create a new component instance.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.articles.article-card');
    }
}
