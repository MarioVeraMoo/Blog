<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagContoller;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class )->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('roles', RoleController::class )->names('admin.roles');
Route::resource('categories', CategoryController::class )->except('show')->names('admin.categories');
Route::resource('tags', TagContoller::class )->except('show')->names('admin.tags');
Route::resource('post', PostController::class )->except('show')->names('admin.posts');

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/