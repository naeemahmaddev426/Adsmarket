<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategorysubController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->get(); // Fetch all subcategories with their categories
        $categories = Category::all(); // Fetch all categories for the form
        return view('admin.adssubcategory', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_name' => 'required|string|max:255',
        ]);
    
        // Replace spaces with underscores in the sub_category_name
        $subCategoryName = str_replace(' ', '_', $request->sub_category_name);
    
        SubCategory::create([
            'category_id' => $request->category_id,
            'sub_category_name' => $subCategoryName,
        ]);
    
        return redirect()->route('admin.adssubcategory')->with('success', 'Sub Category added successfully.');
    }
    

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the form
        return view('admin.editadssubcategory', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_name' => 'required|string|max:255',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
        ]);

        return redirect()->route('admin.adssubcategory')->with('success', 'Sub Category updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('admin.adssubcategory')->with('success', 'Sub Category deleted successfully.');
    }
}