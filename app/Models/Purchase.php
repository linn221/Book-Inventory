<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'book_id'];

    // purchase table has book_id column
    public function book()
    {
        // purchases.book_id = books.id
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function student()
    {
        // purchases.student_id = students.id
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
