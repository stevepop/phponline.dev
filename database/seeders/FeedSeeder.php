<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class FeedSeeder extends Seeder
{
    public function run()
    {
        $profiles = Profile::inRandomOrder()->take(5)->get();

        $profiles->each(function (Profile $profile) {
            $profile->feeds()->create([
                'url' => Arr::random([
                    'https://freek.dev/feed/originals',
                    'https://sebastiandedeyne.com/feed/articles',
                    'https://www.stitcher.io/rss',
                    'https://alexvanderbist.com/feed',
                    'https://rias.be/feed'
                ]),
                'approved' => true
            ]);
        });

        Artisan::call('feeds:import');
    }
}
