<?php

namespace App\Http\Livewire\Dashboard\Podcasts;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public ?string $url;

    protected array $rules = [
        'url' => ['required', 'string', 'url']
    ];

    public function remove(int $id)
    {
        $feed = Podcast::find($id);
        $feed->delete();
    }

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
        return view('livewire.dashboard.podcasts.manage', [
            'podcasts' => Podcast::with(['bookmark'])->where('submitted_by_user_id', auth()->user()->id)->paginate()
        ]);
    }
}
