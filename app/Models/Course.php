<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'note'
    ];

    public function books()
    {
        // courses.id = books.course_id
        return $this->hasMany(Book::class);
    }
}
