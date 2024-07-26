<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryNameType extends Model
{
    use HasFactory;

    protected $table = 'sub_category_name_type';

    protected $fillable = [
        'id',
        'category_id',
        'sub_category_id',
        'sub_category_name_type',
    ];
    public function subCategory()
{
    return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
}
}
