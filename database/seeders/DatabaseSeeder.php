<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Event;
use App\Models\Link;
use App\Models\UserGroup;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PackageSeeder::class);

        Article::factory(50)->create();
        TagFactory::times(20)->create();
        Link::factory(50)->create();

        $this->call(CategorySeeder::class);

        UserGroup::factory(50)->create();

        Event::factory(89)->create();
    }
}
