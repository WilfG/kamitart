<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\ArtsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UsersController;
use App\Models\Art;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('home', function(){
    return 'oui';
});

Route::get('/', [FrontController::class, 'index']);

Route::get('logout', [UsersController::class, 'logout']);
Route::get('art_show/{id}', [ArtsController::class, 'show'])->name('art.show');
Route::get('artist_show/{id}', [ArtistsController::class, 'show'])->name('artist.show');
Route::middleware(['auth'])->group(function(){
    
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            $nbr_artist = DB::table('artists')->count('*');
            $nbr_art = DB::table('arts')->count('*');
            $nbr_category = DB::table('categories')->count('*');
            $nbr_users = DB::table('users')->count('*');
            return view('dashboard.index', compact('nbr_artist', 'nbr_art', 'nbr_category', 'nbr_users'));
        });
        
        Route::resource('users', UsersController::class);
        Route::resource('artists', ArtistsController::class)->except('show');
        Route::resource('categories', CategoriesController::class);
        Route::resource('arts', ArtsController::class)->except('show');
    });
});
