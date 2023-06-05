<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(15)->create();
        //
        // will input them later, can't mind this for now
        $books = [
            [
                'Head First PHP',
                'Learning PHP',
                'Laravel Up And Running'
            ],
            [
                'Python crash course',
                'Boolean Algebra',
                'Grokking Algorithms',
                'Thomas Calculus'
            ],
            [
                'Head First Java',
                'Java: The Complete Reference',
                'Head First Design Patterns'
            ] ,
            [
                'C Programming Language'
            ]
        ];

    }
}
