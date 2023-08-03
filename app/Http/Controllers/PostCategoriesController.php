<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::all();

        return view('dashboard.post_categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get the data from the request
        $name = $request->input('name');

        // Create a new Post instance and put the requested data to the corresponding column
        $category = new PostCategory();
        $category->name = $name;

        // Save the data
        $category->save();

        return redirect()->route('postcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = PostCategory::all()->find($id);
        $posts = $category->posts();

        return view('dashboard.post_categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = PostCategory::all()->find($id);

        return view('dashboard.post_categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Get the data from the request
        $name = $request->input('name');

        // Find the requested category and put the requested data to the corresponding column
        $category = PostCategory::all()->find($id);
        $category->name = $name;

        // Save the data
        $category->save();

        return redirect()->route('postcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = PostCategory::all()->find($id);

        $category->delete();

        return redirect()->route('postcategories.index');
    }
}
