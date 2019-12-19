<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'feedback',
        'star',
    ];
}
