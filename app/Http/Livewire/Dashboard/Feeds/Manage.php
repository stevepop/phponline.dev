<?php

namespace App\Http\Livewire\Dashboard\Feeds;

use App\Models\Feed;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Concerns\HasModal;

class Manage extends Component
{
    use HasModal;
    use WithPagination;

    public function render()
    {
        return view('livewire.dashboard.feeds.manage', [
            'feeds' => Feed::with(['items', 'bookmark'])->where('profile_id', auth()->user()->profile->id)->paginate()
        ]);
    }
}
