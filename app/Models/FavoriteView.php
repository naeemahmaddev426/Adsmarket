<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteView extends Model
{
    protected $table = 'favorite_view';

    protected $fillable = [
        'ad_id', 'users_id', 'view', 'like', 'phone_view'
    ];

    // Relationship to the Ad model
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
