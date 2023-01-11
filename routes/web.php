<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestbookController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Route::get('/home', function () {
    //     return view('home');
    // })->name('home');
    Route::get('/portofolio', function () {
        return view('portofolio');
    })->name('portofolio');
    Route::get('/gear', function () {
        return view('gear');
    })->name('gear');
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/', [PostController::class, 'home'])->name('home');
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/post/{slug}', [PostController::class, 'show'])->name('post');
    Route::resource('guestbook', GuestbookController::class);
    // ->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::patch('/guestbook/{guestbook}/unpin', [GuestbookController::class, 'unpin'])->name('guestbook.unpin');
    Route::patch('/guestbook/{guestbook}/pin', [GuestbookController::class, 'pin'])->name('guestbook.pin');

    // Route::get('/post', function () {
    //     return view('post');
    // })->name('post');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
});
