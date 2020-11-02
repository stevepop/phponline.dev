<?php

namespace App\Http\Livewire\Dashboard\Feeds;

use App\Models\Feed;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public ?string $url;

    protected array $rules = [
        'url' => ['required', 'string', 'url']
    ];

    public function save()
    {
        $this->validate();

        auth()->user()->profile->feeds()->create([
            'url' => $this->url
        ]);

        $this->url = null;

        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard.feeds.manage', [
            'feeds' => Feed::with(['items', 'bookmark'])->where('profile_id', auth()->user()->profile->id)->paginate()
        ]);
    }
}
