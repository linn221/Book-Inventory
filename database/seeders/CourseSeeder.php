<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $courses = ['PHP', 'Python', 'Java', 'CS'];
        foreach($courses as $course) {
            Course::create([
                'name' => $course
            ]);
        }
    }
}
