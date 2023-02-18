<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

// The root route that displays the principal view.
Route::get('/', function () {
    return view('principal');
});

// The register routes that handle the display and submission of the registration form.
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// The login routes that handle the display and submission of the login form.
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// The logout route that logs the user out and redirects to the login page.
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// The route that displays the posts for a specific user.
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

// The route that displays the post creation form.
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');



