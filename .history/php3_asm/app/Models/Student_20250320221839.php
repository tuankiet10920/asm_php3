<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // `id`, `name`, `image`, `birthday`, `address`, 
    // `email`, `phone`, `created_at`, `updated_at`
    protected $table = 'student';
    protected $attributes = [
        'name' => 'Student X',
        'image' => 'studentx.jpg',
        'birthday' => '1975-04-30',
        'address' => 'studentx.jpg',
        'email' => 'studentx@gmail.com',
        'phone' => '0123456789',
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
