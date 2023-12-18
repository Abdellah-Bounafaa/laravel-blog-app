<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [BlogController::class, "index"])->name('blogs');

Auth::routes();
Route::prefix("/blogs")->group(function () {
    Route::post('/{id}/edit', [BlogController::class, "update"])->name('update')->middleware(['admin', "auth"]);
    Route::get('/blog/{title}', [BlogController::class, "show"])->name('show');
    Route::get('/{id}/edit', [BlogController::class, "edit"])->name("edit")->middleware(['admin', "auth"]);
    Route::get('/create', function () {
        return view('blogs.edit');
    })->middleware(['admin', "auth"])->name("create");
    Route::delete('/{id}/delete', [BlogController::class, "destroy"])->name('delete')->middleware(['admin', "auth"]);
    Route::post('/store', [BlogController::class, "store"])->name('store')->middleware(['admin', "auth"]);
    Route::get('/category/{title}', [BlogController::class, "category_blogs"])->name('category');
    Route::match(['get', 'post', "head"], '/search', [BlogController::class, 'search_blog'])->name('search');
});
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::get('/messages', [ContactController::class, 'index'])->name('messages');
Route::post('/send', [ContactController::class, "send"])->name("send");
Route::get('/privacy', function () {
    return view('privacy.privacy');
})->name('privacy');
Route::get('/about', function () {
    return view('About.about');
})->name('about');