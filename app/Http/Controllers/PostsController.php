<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();
        $tags = Tag::all();
        return view('dashboard.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get the data from the request
        $title = $request->input('title');
        $content = htmlspecialchars($request->input('content'), ENT_QUOTES);

        if ($request->input('is_published') == 'on') {
            $is_published = true;
        } else {
            $is_published = false;
        }

        // Create a new Post instance and put the requested data to the corresponding column
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->is_published = $is_published;

        // Save the cover image
        $path = $request->file('cover')->store('cover', 'public');
        $post->cover = $path;

        // Set user
        $user = Auth::user();
        $post->user()->associate($user);
        
        // Set category
        $category = PostCategory::find($request->input('categorie_id'));
        // dd($category);
        $post->category()->associate($category);

        // Save post
        $post->save();

        //Set tags
        $tags = $request->input('tags');
        // dd($post->tags());

        foreach ($tags as $tag) {
            $post->tags()->attach($tag);
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = PostCategory::all();
        $tags = Tag::all();
        return view('dashboard.posts.edit', compact('categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
