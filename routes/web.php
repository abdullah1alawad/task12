<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::prefix('posts')->middleware('auth')->group(function(){
    Route::get('create',[PostController::class,'create'])->name('create');
    Route::post('store',[PostController::class,'store'])->name('post.store');
    Route::get('delete/{id}',[PostController::class,'destroy'])->name('delete');
    Route::get('trashed',[PostController::class,'trashed'])->name('trashed');
    Route::get('forceDelete/{id}',[PostController::class,'forceDelete'])->name('force.delete');
    Route::get('restore/{id}',[PostController::class,'restore'])->name('restore');

    Route::middleware('isAdmin')->group(function() {
        Route::get('showAllPosts', [PostController::class, 'showAllPosts'])->name('showAllPosts');
        Route::get('delete/admin/{id}', [PostController::class, 'adminDelete'])->name('admin.delete');
        Route::get('restoreAllPosts', [PostController::class, 'restoreAllPosts'])->name('restoreAllPosts');
        Route::get('admin/forceDelete/{id}', [PostController::class, 'adminForceDelete'])->name('admin.forceDelete');
        Route::get('admin/restore/{id}', [PostController::class, 'adminRestore'])->name('admin.restore');
    });

});

Route::prefix('comments')->middleware('auth')->group(function(){
   Route::get('show',[CommentController::class,'show'])->name('comments.show');
});

