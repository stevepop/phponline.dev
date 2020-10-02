<?php declare(strict_types=1);

namespace App\Console\Commands\Packages;

use App\Actions\Packages\PublishPackageAction;
use App\Models\Package;
use Illuminate\Console\Command;

class PublishScheduledPackagesCommand extends Command
{
    protected $signature = 'packages:publish-scheduled';

    protected $description = 'Publish all scheduled packages.';

    public function handle(PublishPackageAction $action)
    {
        Package::scheduled()->get()
            ->reject(fn(Package $package) => $package->publish_date->isFuture())
            ->each(fn(Package $package) => $action->execute($package));
    }
}
