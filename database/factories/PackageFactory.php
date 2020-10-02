<?php declare(strict_types=1);

namespace Database\Factories;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph,
            'external_url' => $this->faker->url,
            'publish_date' => $this->faker->boolean(50) ? $this->faker->dateTimeBetween('-5 years') : null,
            'published' => true,
            'submitted_by_user_id' => User::factory(),
        ];
    }
}
