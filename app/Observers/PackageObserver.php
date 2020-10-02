<?php declare(strict_types=1);

namespace App\Observers;

use App\Models\Package;
use App\Jobs\Packages\FetchPackageData;

class PackageObserver
{
    /**
     * Handle the package "created" event.
     *
     * @param Package $package
     * @return void
     */
    public function created(Package $package)
    {
        FetchPackageData::dispatch($package);
    }

    /**
     * Handle the package "updated" event.
     *
     * @param Package $package
     * @return void
     */
    public function updated(Package $package)
    {
        //
    }

    /**
     * Handle the package "deleted" event.
     *
     * @param Package $package
     * @return void
     */
    public function deleted(Package $package)
    {
        //
    }

    /**
     * Handle the package "restored" event.
     *
     * @param Package $package
     * @return void
     */
    public function restored(Package $package)
    {
        //
    }

    /**
     * Handle the package "force deleted" event.
     *
     * @param Package $package
     * @return void
     */
    public function forceDeleted(Package $package)
    {
        //
    }
}
