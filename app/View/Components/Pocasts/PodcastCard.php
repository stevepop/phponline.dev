<?php

namespace App\View\Components\Pocasts;

use App\Models\Podcast;
use Illuminate\View\Component;

class PodcastCard extends Component
{
    /**
     * @var Podcast
     */
    public Podcast $podcast;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Podcast $podcast)
    {
        $this->podcast = $podcast;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pocasts.podcast-card');
    }
}
