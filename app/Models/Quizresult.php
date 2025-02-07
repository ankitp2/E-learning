<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizresult extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lesson_id',
        'course_id',
        'score',
        'question_attempted'
    ];
}
