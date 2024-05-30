<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommunityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/post', [VideoController::class, 'myPost'])->name('profile.post');
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

Route::middleware('auth')->group(function (){
    Route::get('/community/index', [CommunityController::class, 'index'])->name('community.index');
    Route::get('/community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::post('/community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::post('/community/store', [CommunityController::class, 'store'])->name('community.store');
    Route::get('/community/show', [CommunityController::class, 'show'])->name('community.show');
    Route::post('/community/delete/{id}',[CommunityController::class,'delete'])->name('community.delete');
    Route::get('/community/edit/{id}',[CommunityController::class,'edit'])->name('community.edit');
    Route::post('/community/edit/{id}', [CommunityController::class, 'edit'])->name('community.edit');
    Route::post('/community/update/{id}', [CommunityController::class, 'update'])->name('community.update');
});

require __DIR__.'/auth.php';
