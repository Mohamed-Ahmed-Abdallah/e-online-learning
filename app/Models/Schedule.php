<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table  = 'schedule';
    protected $fillable = [
        'title', 'file_path', 'dept_id', 'level_id'
    ];

    public $timestamps = false;
}
