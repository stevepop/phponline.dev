<?php

namespace App\Http\Livewire\Profile;

use App\Models\FeedItem;
use Livewire\Component;

class FeedCard extends Component
{
    public FeedItem $item;

    public function mount(FeedItem $item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.profile.feed-card');
    }
}
