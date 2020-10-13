<?php

namespace App\Http\Livewire\User;

use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class BookmarkButton extends Component
{
    /**
     * @var Model
     */
    public Model $original;

    /**
     * @var string
     */
    public string $model;

    /**
     * @var int
     */
    public int $identifier;

    /**
     * @var bool
     */
    public bool $bookmarked = false;

    public function toggle()
    {
        if ($this->bookmarked) {
            $bookmark = Bookmark::where('bookmarkable_id', $this->identifier)->where('bookmarkable_type', $this->model)->first();
            $bookmark->delete();

            $this->bookmarked = false;
        } else {
            auth()->user()->bookmarks()->create([
                'bookmarkable_id' => $this->identifier,
                'bookmarkable_type' => $this->model
            ]);

            $this->bookmarked = true;
        }
    }

    private function loadBookmarks()
    {
        auth()->user()->bookmarks->each(function ($bookmark) {
            if ($bookmark->bookmarkable_id === $this->identifier && $bookmark->bookmarkable_type === $this->model) {
                $this->bookmarked = true;
            }
        });
    }

    public function mount(Model $model)
    {
        $this->model = get_class($model);
        $this->identifier = $model->id;
        $this->original = $model;

        $this->loadBookmarks();;
    }

    public function render()
    {
        return view('livewire.user.bookmark-button');
    }
}
