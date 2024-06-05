<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newCategory = new Category;
        $newCategory->categoryName = $request->categoryName;
        $newCategory->description = $request->description;

        $newCategory->save();

        return redirect()->route('category.index')->with('success', 'Category record created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->categoryName = $request->categoryName;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Check if the category has any associated books
        if ($category->books()->exists()) {
            return redirect()->route('category.index')->with('error', 'Cannot delete the category because it has associated books');
        }

        // If no associated books, proceed to delete the category
        $category->delete();

        return redirect()->route('user.index')->with('success', 'Category record deleted successfully');
    }
}
