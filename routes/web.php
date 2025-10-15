<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'showDataInHome'])->name('home');

Route::get('/dashboard', [UserController::class, 'home'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get("/fullpost/{id}", [UserController::class, 'showFullPost'])->name('fullpost');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard/addpost', [AdminController::class, 'addPost'])->name('admin.addpost');
    Route::post('/dashboard/addpost', [AdminController::class, 'createPost'])->name('admin.createpost');

    Route::get('/dashboard/allpost', [AdminController::class, 'allPost'])->name('admin.allpost');

    Route::get('/dashboard/allpost/{id}', [AdminController::class, 'updatePost'])->name('admin.update');
    Route::post('/dashboard/allpost/{id}', [AdminController::class, 'postUpdate'])->name('admin.postupdate');
    Route::get('/dashboard/deletepost/{id}', [AdminController::class, 'deletepost'])->name('admin.deletepost');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
