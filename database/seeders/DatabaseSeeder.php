<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Event;
use App\Models\Article;
use App\Models\Bookmark;
use App\Models\UserGroup;
use Illuminate\Database\Seeder;
use Database\Factories\TagFactory;
use Database\Seeders\BookmarkSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PackageSeeder::class,
            PodcastSeeder::class,
            CategorySeeder::class
        ]);

        Article::factory(50)->create();
        TagFactory::times(20)->create();
        Link::factory(50)->create();
        UserGroup::factory(50)->create();
        Event::factory(89)->create();

        $this->call([
            FeedSeeder::class,
        ]);

        $this->call([
            BookmarkSeeder::class,
        ]);
    }
}
