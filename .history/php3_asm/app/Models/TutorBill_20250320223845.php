<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorBill extends Model
{
    // `id`, `fee`, `total`, `status`, `payment_method`, `created_at`, 
    // `updated_at`, `id_tutor`, `id_class`
    protected $table = 'class';
    protected $attributes = [
        'fee' => 10,
        'total' => 23000000,
        'status' => 1,
        'payment_method' => 'MOMO',
        'id_tutor' => 1,
        'id_class' => 2,
    ];
    protected $fillable = [
        'fee',
        'total',
        'status',
        'payment_method',
        'id_tutor',
        'id_class',
    ];
}
