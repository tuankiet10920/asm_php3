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
