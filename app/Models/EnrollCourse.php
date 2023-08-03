<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourse extends Model
{
    protected $table = 'enrollcourse';
    protected $fillable = [
        'student_id', 'course_id'
    ];

    public $timestamps = false;
}
