<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    // `id`, `time_start`, `status`, `qty_students`, `created_at`,
    // `updated_at`, `id_type`, `id_subject`, `id_tutor`
    protected $table = 'class';
    protected $dates = ['time_start'];
    protected $attributes = [
        'status' => 'Chưa hoạt động',
        'id_type' => 1,
        'id_subject' => 3,
        'id_tutor' => 1,
    ];
    protected $fillable = [
        'time_start',
        'status',
        'id_type',
        'id_subject',
        'id_tutor',
    ];
    // Liên kết các bảng nha các bro
    public function type()
    {
        return $this->belongsTo(TypeClass::class, 'id_type');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'id_subject');
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }

    public function students()
    {
        return $this->hasMany(StudentClass::class, 'id_class');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->time_start = now();
        });
    }
}