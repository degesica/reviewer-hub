<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResource extends Model
{
    protected $fillable = [
        'title',
        'description',
        'academic_program',
        'subject',
        'topic',
        'year_level',
        'uploaded_by',
    ];
}
