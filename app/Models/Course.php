<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable = [
        'title', 'dept_id', 'level_id', 'term_name', 'instructor_id', 'TA_id'
    ];

    public $timestamps = false;
}
