<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $fillable = [
        'title', 'file_path', 'course_id', 'uploader_id', 'video_type'
    ];

    public $timestamps = false;
}
