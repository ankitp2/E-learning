<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_title',
        'course_price',
        'tutor',
        'thumbnail',
        'intro_video',
        'description'
    ];
    public function getPath()
    {
        $url = 'uploads/'.$this->file_path;
        return $url;
    }
}
