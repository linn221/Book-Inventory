<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'name',
        'course_id',
        'price',
        'stock',
        'minStock'
    ];

    public function course() {
        // book.course_id = courses.id
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}