<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send', [ContactController::class, "send"])->name("send");
Route::get('/privacy-policy', function () {
    return view('privacy.privacy');
})->name('privacy');
Route::get('/about-us', function () {
    return view('About.about');
})->name('about');