<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class CreateArticle extends Component
{
    public $article;
    public $success = false;

    protected $rules = [
      'article.title' => 'required',
      'article.body' => 'required|min:10',
    ];

    public function mount()
    {
        $this->article = new Article();
    }
    public function render()
    {
        return view('livewire.articles.create-article');
    }

    public function save()
    {
        $this->validate();

        $this->success = true;
//        \Log::debug('data', ['article' => $this->article]);
    }
}
