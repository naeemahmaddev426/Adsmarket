<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PostCategory extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('post_ad', compact('categories'));
    }
}



