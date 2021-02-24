<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticleForm extends Component
{
    public $article;
    public $categories;
    public $levels;
    public $success = false;

    protected $rules = [
      'article.title' => 'required',
      'article.body' => 'required|min:10',
      'article.category_id' => 'required',
      'article.level' => 'required'
    ];

    public function mount()
    {
        $this->article = new Article();
        $this->categories = Category::all();
        $this->levels = [
            'beginner' => 'Beginner',
            'intermediate' => 'Intermediate',
            'advanced' => 'Advanced'
        ];

    }

    public function render()
    {
        return view('livewire.articles.article-form');
    }

    public function saveArticle()
    {

        $this->validate();

        $this->article->slug = Str::slug($this->article->title);
        $this->article->excerpt = Str::words($this->article->title, 10);
        $this->article->submitted_by_user_id = auth()->user()->id;
        $this->article->save();

       
        return redirect()->route('categories:show', ['category' => 'tutorials']);
    }
}
