<?php

namespace App\Http\Livewire\Dashboard\Packages;

use App\Http\Livewire\Concerns\HasModal;
use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;
    use HasModal;

    public function render()
    {
        return view('livewire.dashboard.packages.manage', [
            'packages' =>  Package::where('submitted_by_user_id', auth()->user()->id)->paginate()
        ]);
    }
}
