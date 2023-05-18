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
        $latest_id = DB::table('students')->latest()->first('id')->id + 1;
        for($id = $latest_id; $id < $latest_id + 200; $id++) {
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
                'May'
            ];
            $year = $id % 5;
            $no = $id / 5;
            $roll_no = $year . 'CS' . $no;
            $name = Arr::random($names) . " " . Arr::random($names);
            $paid = $id % 3 ? 'no' : 'yes';

        DB::table('students')->insert([
            'name' => $name,
            'roll_no' => $roll_no,
            'paid' => $paid,
            'course_id' => 1
        ]);

        $purchases = $books->random(Arr::random($integers))->pluck('id');
        foreach($purchases as $book_id) {
            DB::table('purchases')->insert([
                'student_id' => $id,
                'book_id' => $book_id
            ]);
            }
        }
   }
}
