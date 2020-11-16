<?php

namespace App\View\Components\Packages;

use Illuminate\View\Component;

class DependencyList extends Component
{
    public string $title;

    public array $dependencies;

    public function __construct(string $title, array $dependencies)
    {
        $this->title = $title;
        $this->dependencies = $dependencies;
    }

    public function render()
    {
        return view('components.packages.dependency-list');
    }
}
