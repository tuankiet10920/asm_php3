<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // `id`, `name`, `image`, `birthday`, `address`, 
    // `email`, `phone`, `created_at`, `updated_at`
    protected $table = 'student';
    protected $attributes = [
        'name' => 'Subject X',
        'image' => 12,
        'birthday' => '',
        'address' => 'subjectx.jpg',
        'email' => '',
        'phone' => '',
    ];
    protected $fillable = [
        'name',
        'image',
        'birthday',
        'address',
        'email',
        'phone',
    ];
}
