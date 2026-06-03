<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adsbusiness extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_no', 'category_name', 'interests'];

    protected $casts = [
        'interests' => 'array',
    ];
}

