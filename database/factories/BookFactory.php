<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->userName(),
            'price' => rand(1, 80) * 1000,
            'stock' => rand(8, 200),
            'minStock' => rand(5, 15),
            'course_id' => 1
        ];
    }
}
