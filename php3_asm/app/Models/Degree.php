<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    // `id`, `name`, `image`, `created_at`, `updated_at`, `id_tutor`
    protected $table = 'degree';
    protected $attributes = [
        'name' => 'Degree X',
        'image' => 'degreex.jpg',
        'id_tutor' => 1,
    ];
    protected $fillable = [
        'name',
        'image',
        'id_tutor',
    ];
}
