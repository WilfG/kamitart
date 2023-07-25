<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $cat_medievals = Category::where('name', 'Mediéval')->get();
        $cat_contemporains = Category::where('name', 'Contemporain')->get();
        $arts = DB::table('arts')->get();
        $artists = Artist::all();
        return view('welcome', compact('categories', 'arts', 'artists', 'cat_medievals', 'cat_contemporains'));
    }

    
}
