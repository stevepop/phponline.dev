<?php declare(strict_types=1);

namespace Database\Factories;

use App\Models\Feed;
use App\Models\Link;
use App\Models\User;
use App\Models\Event;
use App\Models\Article;
use App\Models\Package;
use App\Models\Podcast;
use App\Models\Bookmark;
use App\Models\FeedItem;
use App\Models\UserGroup;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    protected $model = Bookmark::class;

    public function definition()
    {
        $models = [
            Article::class,
            Event::class,
            Feed::class,
            Link::class,
            Package::class,
            Podcast::class,
            UserGroup::class,
        ];

        $class = Arr::random($models);

        return [
            'bookmarkable_type' => $class,
            'bookmarkable_id' => $class::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
