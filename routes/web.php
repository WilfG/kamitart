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

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/', [FrontController::class, 'index']);

Route::get('logout', [UsersController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    
    Route::prefix('dashboard')->group(function () {
        Route::resource('users', UsersController::class);
        Route::resource('artists', ArtistsController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('arts', ArtsController::class);
    });
});
