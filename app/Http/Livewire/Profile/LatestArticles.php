<?php

namespace App\Http\Livewire\Profile;

use App\Models\Article;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class LatestArticles extends Component
{
    use WithPagination;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.profile.latest-articles', [
            'articles' => Article::where('submitted_by_user_id', $this->user->id)
                ->published()
                ->latest('publish_date')
                ->paginate(3)
        ]);
    }
}
