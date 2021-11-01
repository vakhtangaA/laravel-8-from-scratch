<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;

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

Route::post('newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/authors/{author:username}', [AuthorsController::class, 'index']);

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware(['guest'])->group(function () {
	Route::view('register', 'register.create');
	Route::post('register', [RegisterController::class, 'store']);
	Route::view('login', 'sessions.create');
	Route::post('sessions', [SessionsController::class, 'store']);
});

Route::middleware('can:admin')->group(function () {
	Route::resource('admin/posts', AdminPostController::class)->except('show');
});
