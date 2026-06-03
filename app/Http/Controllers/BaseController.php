<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteView;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $recentlyview;

    public function __construct()
    {
        $userId = Auth::id();

        $this->recentlyview = FavoriteView::whereIn('id', function ($query) use ($userId) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('favorite_view')
                    ->where('users_id', $userId)
                    ->where('view', '>', 0)
                    ->groupBy('ad_id');
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        view()->share('recentlyview', $this->recentlyview);
    }
}
