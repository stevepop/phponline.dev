<?php declare(strict_types=1);

namespace App\Console\Commands\Packages;

use App\Jobs\Packages\FetchPackageData;
use App\Models\Package;
use Illuminate\Console\Command;

class SyncPackagesCommand extends Command
{
    protected $signature = 'packages:sync';

    protected $description = 'Sync all packages against the packagist API';

    public function handle()
    {
        foreach (Package::published()->get() as $package) {
            FetchPackageData::dispatch($package);
        }
    }
}
