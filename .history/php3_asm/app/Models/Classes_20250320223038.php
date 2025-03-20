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
        'status' => 0,
        'qty_students' => 3,
        'id_type' => 1,
        'id_subject' => 3,
        'id_tutor' => 1,
    ];
    protected $fillable = [
        'time_start',
        'status',
        'qty_students',
        'id_type',
        'id_subject',
        'id_tutor',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->time_start = now();
        });
    }
}
