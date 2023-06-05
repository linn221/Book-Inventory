<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Course;
use App\Models\Purchase;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(100)->create();
        Purchase::factory(250)->create();
        //
    }
}
