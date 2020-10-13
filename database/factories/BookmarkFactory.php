<?php declare(strict_types=1);

namespace Database\Factories;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookmarkFactory extends Factory
{
    protected $model = Bookmark::class;

    public function definition()
    {
        $models = [
            Article::class,
            Package::class
        ];

        $class = Arr::random($models);

        return [
            'bookmarkable_type' => $class,
            'bookmarkable_id' => $class::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
