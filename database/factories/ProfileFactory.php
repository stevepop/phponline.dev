<?php declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        $user = User::factory()->create();

        return [
            'slug' => Str::slug($user->name),
            'active' => true,
            'user_id' => $user->id,
        ];
    }
}
