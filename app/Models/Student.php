<?php

namespace App\Models;

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
}
