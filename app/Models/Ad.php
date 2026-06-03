<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'title',
        'description',
        'category_name',
        'sub_category_name',
        'sub_category_name_type',
        'brand',
        'condition',
        'type',
        'device',
        'make_car',
        'year_update',
        'kms_driven_no',
        'feature',
        'area_unit',
        'area_square',
        // 'sale_land_area',
        'furnished',
        'pro_rent_house_bedroom',
        'pro_rent_house_bathroom',
        'pro_sale_house_bedroom',
        'pro_sale_house_bathroom',
        'pro_sale_appart_bedroom',
        'pro_sale_appart_bathroom',

        'pro_rent_apart_bedroom',
        'pro_rent_apart_bathroom',
        'pro_rent_appart_floor',
        
        'bedroom2',
        'bathroom2',
        'floor_level2',
        'rent_shope_bathroom',
        'floor_level_shope_rent',
        'bedroom_vacation_rent',
        'bathroom_vacation_rent',
        'make_bike',
        
        'construction_state_new_rent_house',
        'construction_state_new',
        'pro_sale_appart_floor_level',
        'pro_sale_shope_floor_level',
        'pro_sale_portion_bedroom',
        'pro_sale_portion_bathroom',
        'pro_sale_portion_floor_level',
        'no_storeys',
        'model_bike',
        'make_bike2',
        'engine_type',
        'engine_capacity',
        'ignition_type',
        'origin',
        'registration_city',
        'product',
        'price',
        'location',
        'review_name',
        'phone_no',
        'ad_status',
        'deliverable',
        
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'users_id', 'id');
}

public function images()
{
    return $this->hasMany(adsimage::class, 'ad_id', 'id');
}
public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Adjust based on your schema
    }
   

public function subcategories()
{
    return $this->belongsToMany(SubCategory::class, 'ad_subcategory', 'ad_id', 'subcategory_id');
}
public function favoriteViews()
    {
        return $this->hasMany(FavoriteView::class);
    }
}
