<?php declare(strict_types=1);

namespace App\Jobs\Packages;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Spatie\Packagist\PackagistClient;

class FetchPackageData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    public string $package;

    /**
     * @var Package
     */
    public Package $model;

    /**
     * FetchPackageData constructor.
     * @param Package $package
     */
    public function __construct(Package $package)
    {
        $this->model = $package;
        $urlInfo = parse_url($package->external_url);
        $this->package = Str::after($urlInfo['path'], "/packages/");
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PackagistClient $packagist)
    {
        $metaData = $packagist->getPackageMetadata($this->package);

        $releases = collect($metaData['packages'][$this->package]);

        $this->model->update([
            'title' => $releases->last()['name'],
            'body' => $releases->last()['description'],
            'json' => $releases->last()
        ]);
    }
}
