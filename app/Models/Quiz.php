<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'lesson_id',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer'
    ];
}
