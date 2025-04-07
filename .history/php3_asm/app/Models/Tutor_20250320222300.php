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
        'name' => 'Tutor X',
        'birthday' => '1975-04-30',
        'education_level' => '12/12',
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
