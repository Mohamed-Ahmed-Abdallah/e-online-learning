<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';
    protected $fillable = [
        'name', 'address', 'email', 'password', 'dept_id', 'course_id', 'job_title'
    ];
    public $timestamps = false;
}
