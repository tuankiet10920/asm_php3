<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeClass extends Model
{
    // `id`, `name`, `price`, `created_at`, `updated_at`
    protected $table = 'type_class';
    protected $attributes = [
        'name' => '',
        'price' => 0
    ];
    protected $fillable = [
        'name',
        'price',
    ];
}
