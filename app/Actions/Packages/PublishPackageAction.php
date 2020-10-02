<?php declare(strict_types=1);

namespace App\Actions\Packages;

use App\Models\Package;

class PublishPackageAction
{
    public function execute(Package $package)
    {
        $package->published = true;

        if (! $package->publish_date) {
            $package->publish_date = now();
        }

        $package->save();
    }
}
