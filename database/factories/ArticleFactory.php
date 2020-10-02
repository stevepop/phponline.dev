<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentences(2, true),
            'body' => $this->faker->paragraphs(6, true),
            'publish_date' => $this->faker->boolean(50) ? $this->faker->dateTimeBetween('-5 years') : null,
            'published' => true,
            'category_id' => optional(Category::inRandomOrder()->first())->id ?? null,
            'submitted_by_user_id' => User::factory()
        ];
    }
}
