<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryNameType;
use Illuminate\Http\Request;

class SubCategorytypeContoller extends Controller
{
    public function index()
    {
        $subCategoryTypes = SubCategoryNameType::all();
        $categories = Category::all();
    
        // Fetch all sub-categories initially
        $subcategories = SubCategory::all();
    
        return view('admin.adsubscategorytype', compact('subCategoryTypes', 'subcategories', 'categories'));
    }
public function create()
{
    $categories = Category::all();
    $subCategories = SubCategory::all();
    
    return view('admin.adsubscategorytype', compact('categories', 'subCategories'));
}


public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'sub_category_id' => 'required|exists:sub_categories,id',
        'sub_category_name_type' => 'required|string|max:255',
    ]);

    // Replace spaces with underscores in the sub_category_name_type
    $subCategoryNameTypeValue = str_replace(' ', '_', $request->sub_category_name_type);

    $subCategoryNameType = new SubCategoryNameType();
    $subCategoryNameType->category_id = $request->category_id;
    $subCategoryNameType->sub_category_id = $request->sub_category_id;
    $subCategoryNameType->sub_category_name_type = $subCategoryNameTypeValue;
    $subCategoryNameType->save();

    return redirect()->route('admin.adsubscategorytype')->with('success', 'Sub category name type saved successfully.');
}



    public function edit($id)
    {
        $subCategoryType = SubCategoryNameType::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.editadsubscategorytype', compact('subCategoryType', 'categories', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'sub_category_name_type' => 'required|string|max:255',
        ]);
    
        $subCategoryType = SubCategoryNameType::findOrFail($id);
        $subCategoryType->update($request->all());
    
        return redirect()->route('admin.adsubscategorytype')
                         ->with('success', 'Sub category name type updated successfully.');
    }
    

    public function destroy($id)
{
    $subCategoryType = SubCategoryNameType::findOrFail($id);
    $subCategoryType->delete();

    return redirect()->route('admin.adsubscategorytype')
                     ->with('success', 'Sub category name type deleted successfully.');
}


}