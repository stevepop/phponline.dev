<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserGroupFactory extends Factory
{
    protected $model = UserGroup::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(6, true),
            'url' => $this->faker->url,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'published' => true,
            'submitted_by_user_id' => $this->faker->boolean(50) ? User::factory() : null
        ];
    }
}
