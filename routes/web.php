<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\author\AuthenticatedSessionController;
use App\Http\Controllers\author\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        if ($role == 0) {
            return redirect('/dashboard');
        } elseif ($role == 1) {
            return view('welcome'); // แก้เส้นทางนี้เป็น 'welcome' โดยไม่ใช้ /
        }
    }
    return view('welcome'); // แก้เส้นทางนี้เป็น 'welcome' โดยไม่ใช้ /
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

Route::prefix('author')->group(function () {
    // เพิ่ม Middleware ที่คุณต้องการในส่วนนี้ (ถ้ามี)

    // เส้นทาง "login" สำหรับ "author" ที่อยู่ในโฟลเดอร์ "view/auth/author"
    Route::get('/login', function () {
        return view('auth.author.login');
    })->middleware('guest')->name('author.login');

    // เส้นทาง "register" สำหรับ "author" ที่อยู่ในโฟลเดอร์ "view/auth/author"
    Route::get('/register', function () {
        return view('auth.author.register');
    })->middleware('guest')->name('author.register');

    // เพิ่มเส้นทางแบบ POST สำหรับการล็อกอิน
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('author.login.post');

    // เพิ่มเส้นทางแบบ POST สำหรับการลงทะเบียน
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('author.register.post');
});
// เพิ่ม Middleware ที่คุณต้องการในส่วนนี้ (ถ้ามี)
Route::middleware(['auth', 'verified'])->group(function () {
    // เส้นทางอื่น ๆ ของแอปพลิเคชันที่ต้องการใส่ Middleware
});

require __DIR__ . '/auth.php';
