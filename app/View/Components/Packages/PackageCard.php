<?php

namespace App\View\Components\Packages;

use App\Models\Package;
use Illuminate\View\Component;

class PackageCard extends Component
{
    /**
     * @var Package
     */
    public Package $package;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.packages.package-card');
    }
}
