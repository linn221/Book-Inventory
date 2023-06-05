<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->lastName(),
            'roll_no' => Str::random(3) . "-" . rand(1, 300),
            'paid' => rand(1, 20) % 2 == 0 ? 'yes' : 'no',
            'course_id' => Course::all()->random()->id,
            //
        ];
    }
}
