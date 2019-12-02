<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'video', 'published_at', 'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
