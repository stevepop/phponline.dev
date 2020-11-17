<?php

namespace App\Http\Livewire\Dashboard\Bookmark;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ListBookmarks extends Component
{
    public $bookmarks;

    protected $listeners = [
        'bookmark:removed' => '$refresh'
    ];

    public function loadBookmarks()
    {
        $this->bookmarks = auth()->user()->bookmarks;
    }

    public function mount()
    {
        $this->loadBookmarks();
    }

    public function render()
    {
        return view('livewire.dashboard.bookmark.list-bookmarks');
    }
}
