<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('register', [UserController::class, 'registerView'])->name('register');
    Route::post('register', [UserController::class, 'registerUser']);

    Route::get('login', [UserController::class, 'loginView'])->name('login');
    Route::post('login', [UserController::class, 'loginUser']);
});


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'viewProfile'])->name('profile');
    Route::get('/edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
    Route::patch('/edit-profile', [ProfileController::class, 'updateProfile']);
    Route::get('/profile/{username}', [ProfileController::class, 'viewPublicProfile'])->name('profile.public');

    Route::get('logout', [UserController::class, 'destroy'])->name('logout');

    Route::get('/posts/', function () {
        return redirect()->route('home');
    });
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{uuid}', [PostController::class, 'show'])->name('posts.show');

//    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
//    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});
