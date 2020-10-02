<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        $now = now();

        $start = $now->addDays(14);
        $end = $start->addDays($this->faker->numberBetween(1, 5));

        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(4, true),
            'external_url' => $this->faker->url,
            'published' => $this->faker->boolean,
            'publish_date' => $this->faker->boolean(50) ? $this->faker->dateTimeBetween('-5 years') : null,
            'eventable_type' => UserGroup::class,
            'eventable_id' => UserGroup::inRandomOrder()->first()->id,
            'timezone' => $this->faker->timezone,
            'starts_at' => $start->utc(),
            'ends_at' => $end->utc()
        ];
    }
}
