<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    private $packages = [
        [
            'title' => 'URI Builder',
            'external_url' => 'https://packagist.org/packages/juststeveking/uri-builder',
        ],
        [
            'title' => 'Companies House Laravel',
            'external_url' => 'https://packagist.org/packages/juststeveking/companies-house-laravel',
        ],
        [
            'title' => 'Config',
            'external_url' => 'https://packagist.org/packages/juststeveking/config',
        ],
        [
            'title' => 'Cypher Query Builder',
            'external_url' => 'https://packagist.org/packages/juststeveking/cypher-query-builder',
        ],
    ];

    public function run()
    {
        foreach ($this->packages as $package) {
            Package::create($package);
        }
    }
}
