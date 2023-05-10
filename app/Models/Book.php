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
        // return $this->hasOne(Course::class, 'id', 'course_id');
        // i don't have a full idea what is happening 
        return $this->belongsTo(Course::class);
    }
}