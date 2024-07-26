<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.adscategory', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'nullable|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $imagePath = null;
    
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/images'), $imageName); 
                $imagePath = 'assets/images/' . $imageName;
            }
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->category_image = $imagePath;
            $category->save();
            return redirect()->route('admin.adscategory')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.adscategory')->with('error', 'Error creating category: ' . $e->getMessage());
        }
    }
    
    public function destroy($id)
{
    try {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.adscategory')->with('success', 'Category deleted successfully');
    } catch (\Exception $e) {
        return redirect()->route('admin.adscategory')->with('error', 'Error deleting category: ' . $e->getMessage());
    }
}
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editcategory', compact('category'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'nullable|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $category = Category::findOrFail($id);
            $imagePath = $category->category_image;
    
            if ($request->hasFile('category_image')) {
                if ($imagePath) {
                    Storage::delete($imagePath);
                }
                $image = $request->file('category_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/images'), $imageName); 
                $imagePath = 'assets/images/' . $imageName;
            }
    
            $category->category_name = $request->category_name;
            $category->category_image = $imagePath;
            $category->save();
    
            return redirect()->route('admin.adscategory')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.adscategory')->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }
    
   

}
