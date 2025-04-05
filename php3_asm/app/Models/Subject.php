<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // `id`, `name`, `course_duration`, `name_lesson`, `image`,
    // `note`, `file`, `id_subject`, `created_at`, `updated_at`
    protected $table = 'subject';
    protected $attributes = [
        'name' => 'Subject X',
        'course_duration' => 12,
        'name_lesson' => '',
        'image' => 'subjectx.jpg',
        'note' => '',
        'file' => '',
        'id_subject' => 0,
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
