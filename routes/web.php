<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoriesSubController;
use App\Http\Controllers\ProductsQualityController;
use App\Http\Controllers\ResultController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('home.detail');
Route::get('/pemilihan', [HomeController::class, 'chose'])->name('home.chose');
Route::post('/pemilihan', [HomeController::class, 'chose'])->name('home.chose');

Route::prefix('webadmin')->group(function () {
    Route::get('/', [UserController::class, 'login'])->name('users.login');
    Route::post('/', [UserController::class, 'login'])->name('users.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('users.logout');
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('categories-subs', CategoriesSubController::class);
        Route::resource('products-qualities', ProductsQualityController::class);
        Route::get('result', [ResultController::class, 'index'])->name('result.index');
    });
});
