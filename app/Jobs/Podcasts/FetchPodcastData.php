<?php declare(strict_types=1);

namespace App\Jobs\Podcasts;

use App\Models\Podcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use shweshi\OpenGraph\OpenGraph;

class FetchPodcastData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Podcast $podcast;

    public function __construct(Podcast $podcast)
    {
        $this->podcast = $podcast;
    }

    public function handle()
    {
        $data = (new OpenGraph())->fetch($this->podcast->external_url);

        $this->podcast->update([
            'title' => $data['title'] ?? $this->podcast->title,
            'body' => $data['description'] ?? $this->podcast->body,
            'json' => $data
        ]);
    }
}
