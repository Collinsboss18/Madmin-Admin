<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminUsersController;
use App\Http\Middleware\Admin;



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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([Admin::class])->group(function () {
    Route::get('admin', function () {
        return view('admin.index');
    });
    // Users Routes
    Route::resource('admin/users', AdminUsersController::class);
    Route::get('/admin/users/{id}/toggle_admin', [AdminUsersController::class, 'toggleAdmin']);
    Route::get('/admin/users/{id}/toggle_active', [AdminUsersController::class, 'toggleActive']);
    // Posts Routes
    Route::resource('admin/posts', AdminPostsController::class);
    
});
