<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('name', 'description'), [
            'name' =>  ['required', 'min:2', 'max:50', 'string'],
            'description' => ['required', 'min:2', 'max:50', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }


        $categorie = Category::create([
            'name' =>  $request->name,
            'description' => $request->description,
        ]);

        if ($categorie) {
            return redirect('dashboard/categories');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Category::where('id', $id)->first();
        return view('dashboard.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $artist)
    {
        $validator = Validator::make($request->only('name', 'description'), [
            'name' =>  $request->name,
            'description' => $request->description,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }


        $artist->update([
            'firstname' =>  $request->firstname,
            'lastname' => $request->lastname,
        ]);

        return redirect()->back()->with('status', 'Category informations updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
