<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\ArtsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
// Route::get('/register', function () {
//     return view('auth.register');
// });

Route::get('logout', [UsersController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    
    Route::prefix('dashboard')->group(function () {
        Route::resource('users', UsersController::class);
        Route::resource('artists', ArtistsController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('arts', ArtsController::class);
    });
});
