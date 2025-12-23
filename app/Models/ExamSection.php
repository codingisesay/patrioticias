<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSection extends Model
{
    use HasFactory;

    protected $table = 'exam_sections'; // table ka naam

    protected $fillable = [
        'title',
        'description',
        'type'
    ];
}
