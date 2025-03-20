<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // `id`, `name`, `course_duration`, `name_lesson`, `image`, 
    // `note`, `file`, `id_subject`, `created_at`, `updated_at`
    protected $table = 'type_class';
    protected $attributes = [
        'name' => 'Subject X',
        'course_duration' => 12,
        'name_lesson' => 'Lesson X',
        'image' => 'subjectx.jpg',
        'note' => 'Finished',
        'file' => 'lessonx.pdf',
        'id_subject' => 3,
    ];
    protected $fillable = [
        'name',
        'course_duration',
        'name_lesson',
        'image',
        'note',
        'file',
        'id_subject',
    ];
}
