<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BlogController::class, "index"])->name('blogs');

Auth::routes();
Route::prefix("/blogs")->group(function () {

    Route::post('/{id}/edit', [BlogController::class, "update"])->name('update')->middleware(['admin', "auth"]);
    Route::get('blog/{id}', [BlogController::class, "show"])->name('show');
    Route::get('/{id}/edit', [BlogController::class, "edit"])->name("edit")->middleware(['admin', "auth"]);
    Route::get('/create', function () {
        return view('blogs.edit');
    })->middleware(['admin', "auth"])->name("create");
    Route::delete('/{id}/delete', [BlogController::class, "destroy"])->name('delete')->middleware(['admin', "auth"]);
    Route::post('/store', [BlogController::class, "store"])->name('store')->middleware(['admin', "auth"]);
    Route::get('/category/{id}', [BlogController::class, "category_blogs"])->name('category');
    Route::match(['get', 'post', "head"], '/search', [BlogController::class, 'search_blog'])->name('search');
});
