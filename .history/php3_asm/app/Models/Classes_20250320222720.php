<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    // `id`, `time_start`, `status`, `qty_students`, `created_at`, 
    // `updated_at`, `id_type`, `id_subject`, `id_tutor`
    protected $table = 'class';
    protected $dates = ['birthday'];
    protected $attributes = [
        'time_start' => now(),
        'status' => '1975-04-30',
        'qty_students' => 'Thac Si',
        'id_type' => 'Duong X, phuong X, quan X, thanh pho X',
        'id_subject' => 'tutorx.jpg',
        'id_tutor' => 'studentx@gmail.com',
    ];
    protected $fillable = [
        'time_start',
        'status',
        'qty_students',
        'id_type',
        'id_subject',
        'id_tutor',
    ];
}
