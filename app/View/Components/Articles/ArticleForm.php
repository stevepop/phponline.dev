<?php


namespace App\View\Components\Articles;


use Illuminate\View\Component;

class ArticleForm extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.articles.article-form');
    }
}