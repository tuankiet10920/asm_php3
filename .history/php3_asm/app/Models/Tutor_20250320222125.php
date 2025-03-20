<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    // `id`, `name`, `birthday`, `education_level`, `address`, `image`, 
    // `email`, `phone`, `momo_acc_num`, `created_at`, `updated_at`
    protected $table = 'tutor';
    protected $dates = ['birthday'];
    protected $attributes = [
        'name' => 'Student X',
        'birthday' => '1975-04-30',
        'education_level' => 'studentx.jpg',
        'address' => 'studentx.jpg',
        'image' => 'studentx@gmail.com',
        'email' => '0123456789',
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
