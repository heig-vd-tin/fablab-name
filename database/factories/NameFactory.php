<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class NameFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => Str::headline(fake()->unique()->word()),
            'description' => fake()->sentence(),
            'anonymous' => fake()->boolean(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
