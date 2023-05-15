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
        return $this->belongsTo(Book::class);
    }

}
