<?php

namespace App\Http\Livewire\Profile;

use App\Models\Feed;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FeedList extends Component
{
    public Profile $profile;

    public Collection $feeds;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;

        $this->feeds = Feed::where('profile_id', $profile->id)->where('approved', true)->get();
    }

    public function render()
    {
        return view('livewire.profile.feed-list');
    }
}
