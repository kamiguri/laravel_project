<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/video/index', [VideoController::class, 'index'])->name('video.index');
    Route::post('/video/index',[VideoController::class, 'index'])->name('video.index');
    Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video/show/{id}',[VideoController::class,'show'])->name('video.show');
    Route::post('/video/delete/{id}',[VideoController::class,'delete'])->name('video.delete');
    Route::get('/video/edit/{id}',[VideoController::class,'edit'])->name('video.edit');
    Route::post('/video/update/{id}',[VideoController::class,'update'])->name('video.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/video/{id}/comment', [CommentController::class, 'storeVideoComment'])->name('video.comment.store');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
});

require __DIR__.'/auth.php';
