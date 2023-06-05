<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // lazy attempt at stimulating purchasing data
    public function definition(): array
    {
        $student_id = rand(1,100);
        // purchasing one book from the student's chosen course, instead of random book
        $course_id = Student::find($student_id)->course->id;
        $book_id = Course::find($course_id)->books->random()->id;
        return compact('student_id', 'book_id');
    }
}
