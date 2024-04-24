<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph(5),
            'start_date' => now()->subDays(mt_rand(0, 10)),
            'expiration_date' => now()->addDays(mt_rand(0, 3)),
        ];
    }
}
