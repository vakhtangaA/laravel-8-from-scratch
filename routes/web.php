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

Route::post('newsletter', NewsletterController::class)->name('newsletter');

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comments');

Route::get('/authors/{author:username}', [AuthorsController::class, 'index'])->name('author');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware(['guest'])->group(function () {
	Route::view('register', 'register.create')->name('createUser');
	Route::post('register', [RegisterController::class, 'store'])->name('registerForm');
	Route::view('login', 'sessions.create')->name('login');
	Route::post('sessions', [SessionsController::class, 'store'])->name('sessions');
});

Route::middleware('can:admin')->group(function () {
	Route::resource('admin/posts', AdminPostController::class)->except('show');
});
