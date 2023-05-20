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
                $student = Student::findOrFail(404);
                $id_list = $student->purchases->pluck('book_id');
                $total_bill = Book::whereIn('id', $id_list)->sum('price');
                return $total_bill;
            }
    );
    }

    protected function intro() : Attribute
    {
        return Attribute::make(
            get: function($value = null, array $attributes) {
                return "My name is ". $attributes['name'];
            }
        );
    }
    // protected $attributes = [
    //     'intro' => "hello",
    // ];
}
