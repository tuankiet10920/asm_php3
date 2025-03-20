<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeClass extends Model
{
    // `id`, `name`, `price`, `created_at`, `updated_at`
    protected $table = 'type_class';
    protected $attributes = [
        'name' => 'Loai X',
        'price' => 3000000
    ];
    protected $fillable = [
        'name',
        'price',
    ];
}
