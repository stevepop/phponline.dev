<?php

namespace App\Http\Livewire\Dashboard\Bookmark;

use App\Models\Bookmark;
use Livewire\Component;

class Item extends Component
{
    public $bookmark;

    public ?string $name;

    public ?string $route;


    public function mount(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;

        switch ($bookmark->displayName()) {
            case 'Article':
                $this->name = 'Article';
                $this->route = route('articles:show', [$bookmark->bookmarkable->slug]);
                break;
            case 'Event':
                $this->name = 'Event';
                $this->route = route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                break;
            case 'Feed':
                $this->name = 'Feed';
                $this->route = route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                break;
            case 'Link':
                $this->name = 'Link';
                $this->route = route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                break;
            case 'Package':
                $this->name = 'Package';
                $this->route = route('packages:show', [$bookmark->bookmarkable->slug]);
                break;
            case 'Podcast':
                $this->name = 'Podcast';
                $this->route = route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                break;
            case 'UserGroup':
                $this->name = 'User Group';
                $this->route =route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                break;
        }
    }

    public function remove()
    {
        $this->bookmark->delete();
        $this->emit('bookmark:removed');
    }

    public function render()
    {
        return view('livewire.dashboard.bookmark.item');
    }
}
