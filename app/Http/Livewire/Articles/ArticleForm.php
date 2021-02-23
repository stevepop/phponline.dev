<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class ArticleForm extends Component
{
    public $title;
    public $body;
    public $success = false;

    protected $rules = [
      'title' => 'required',
      'body' => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.articles.article-form');
    }

    public function saveArticle()
    {
        $this->validate();

        $this->success = true;
        \Log::debug('data', ['title' => $this->title, 'body' => $this->body]);
        $this->title = null;
        $this->body = null;
    }
}
