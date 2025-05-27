<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $attributes = [
        'is_completed' => false,
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

}
