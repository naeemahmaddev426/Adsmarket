<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'image_path',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function ads()
    {
        return $this->hasMany(Ad::class, 'category_id'); // Adjust based on your schema
    }
}
