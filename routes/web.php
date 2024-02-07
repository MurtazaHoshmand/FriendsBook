<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


// Admin

Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});
