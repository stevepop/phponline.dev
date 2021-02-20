<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class CreateArticle extends Component
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
        return view('livewire.articles.create-article');
    }

    public function save()
    {
        $this->validate();

        $this->success = true;
//        \Log::debug('data', ['article' => $this->article]);
    }
}
