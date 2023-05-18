<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Course;
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
        //
        $integers = [1, 2, 3, 4, 5, 2, 3, 3, 4];
        $books = Book::all();
        for($i = 0; $i < 200; $i++) {
            // fucking smart syntax here
            $names = [
                'Charlie',
                'Henry',
                'Hali',
                'Dary',
                'Levi',
                'Jonas',
                'Rosy',
                'Allan',
                'Hlaing',
                'Alex',
                'Joe',
                'Hsu',
                'Chloe',
                'Jim',
                'Daniels',
                'Millie',
                'May',
                'Parker',
                'Dani',
                'Walker',
                'Mary',
                'Jane',
                'James',
                'Taylor',
                'Malory',
                'Eve',
                'Bob',
                'Alice'
            ];
            $year = $i % 4 + 1;
            $no = intval($i / 5) + 1;
            $roll_no = $year . 'CS-' . $no;
            $name = Arr::random($names) . " " . Arr::random($names);
            $paid = $i % 3 ? 'no' : 'yes';

        $student_id = DB::table('students')->insertGetId([
            'name' => $name,
            'roll_no' => $roll_no,
            'paid' => $paid,
            'course_id' => 1
        ]);

        $purchases = $books->random(Arr::random($integers))->pluck('id');
        foreach($purchases as $book_id) {
            DB::table('purchases')->insert([
                'student_id' => $student_id,
                'book_id' => $book_id
            ]);
            }
        }
   }
}
