<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // purchases table has student_id column
    // primary key to foreign key
    public function purchases()
    {
        // students.id = purchases.student_id
        return $this->hasMany(Purchase::class);
        // return $this->hasMany(Purchase::class, 'foreign_key', 'local_key');
    }

    public function course()
    {
        // students.course_id = courses.id
        return $this->belongsTo(Course::class);
    }

    protected function totalBill() : Attribute
    {
        // working code, although i am not sure if this is how it's supposed to go
        return Attribute::make(
            get: function($value, $attributes) {
                // yellow, this has been written as a quick fix, i believe i should update it in someways later (maybe relationships, idk)
                // refactor.me, use the below method with $this, instead of repeating
                // $student = Student::findOrFail($attributes['id']);
                $id_list = $this->purchases->pluck('book_id');
                $total_bill = Book::whereIn('id', $id_list)->sum('price');
                return $total_bill;
            }
    );
    }

    protected function booksId() : Attribute
    {
        return Attribute::make(
            get: function($value, $attributes) {
                $id_list = $this->purchases->pluck('book_id');
                return $id_list;
            }
        );
    }

    protected function paid() : Attribute
    {
        return Attribute::make(
            get: fn($value) => $value === 'yes'
        );
    }

    // im not sure what this is doing here but keeping it for now
    // protected $attributes = [
    //     'intro' => "hello",
    // ];
}
