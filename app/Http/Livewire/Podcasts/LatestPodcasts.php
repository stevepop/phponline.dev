<?php

namespace App\Http\Livewire\Podcasts;

use App\Models\Podcast;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LatestPodcasts extends Component
{
    /**
     * @var Collection
     */
    public Collection $podcasts;

    public function mount()
    {
        $this->podcasts = Podcast::with([
            'submittedByUser', 'clicks'
        ])->published()->latest('publish_date')
            ->take(4)->get();
    }

    public function render()
    {
        return view('livewire.podcasts.latest-podcasts');
    }
}
