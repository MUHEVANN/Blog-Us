<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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
Route::middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('post', PostController::class);
    Route::get('/dashboard-admin', [AdminController::class,'index']);
});
Route::get('/',[HomeController::class,'index'])->name('user.home');
Route::get('/home/${id}', [HomeController::class,'show'])->name('home.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function()
{
    Route::resource('comment',CommentController::class);
    Route::post('/reply-comment/${id}',[CommentController::class,'reply'])->name('reply.show');
});
Route::resource('category',CategoryController::class);


// Route::redirect("/","/post");
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

require __DIR__.'/auth.php';