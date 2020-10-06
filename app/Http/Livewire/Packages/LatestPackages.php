<?php

namespace App\Http\Livewire\Packages;

use App\Models\Package;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LatestPackages extends Component
{
    /**
     * @var Collection
     */
    public Collection $packages;

    public function mount()
    {
        $this->packages = Package::with(['submittedByUser', 'clicks'])
            ->published()->latest('publish_date')->take(4)->get();
    }

    public function render()
    {
        return view('livewire.packages.latest-packages');
    }
}
