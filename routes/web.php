<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Author\Auth\AuthorLoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        if ($role == 0) {
            return redirect('/dashboard');
        } elseif ($role == 1) {
            return view('/welcome'); // เปลี่ยนเส้นทางนี้เป็น return view('welcome');
        }
    }
    return view('/welcome');
});



Route::get('/dashboard', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        if ($role == 0) {
            return view('dashboard');
        } else {
            return redirect('/');
        }
    } else {
        return redirect('/');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class);
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/credit', [DashboardController::class, 'index'])->name('credits.index');

Route::get('/author/login', [AuthorLoginController::class, 'showLoginForm'])->name('author.login');

require __DIR__.'/auth.php';
