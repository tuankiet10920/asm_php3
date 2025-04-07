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
        'name' => 'Tutor X',
        'birthday' => '1975-04-30',
        'education_level' => 'Thac Si',
        'address' => 'Duong X, phuong X, quan X, thanh pho X',
        'image' => 'tutor.png',
        'email' => 'studentx@gmail.com',
        'phone' => '0123456789',
        'momo_acc_num' => '0123456789',
    ];
    protected $fillable = [
        'name',
        'birthday',
        'education_level',
        'address',
        'image',
        'email',
        'phone',
        'momo_acc_num',
    ];
}