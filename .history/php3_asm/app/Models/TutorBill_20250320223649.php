<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorBill extends Model
{
    // `id`, `fee`, `total`, `status`, `payment_method`, `created_at`, 
    // `updated_at`, `id_tutor`, `id_class`
    protected $table = 'class';
    protected $dates = [
        'feedback_time',
        'payment_time',
    ];
    protected $attributes = [
        'point' => 100,
        'feedback_content' => 'Something',
        'class_opener' => 3,
        'payment_total' => 10000000,
        'id_student' => 1,
        'id_class' => 2,
    ];
    protected $fillable = [
        'point',
        'feedback_content',
        'feedback_time',
        'class_opener',
        'payment_total',
        'payment_time',
        'id_student',
        'id_class',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->feedback_time = now();
            $model->payment_time = now();
        });
    }
}
