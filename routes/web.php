<?php

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
});
Route::get('/',[HomeController::class,'index'])->name('user.home');
Route::get('/posts/${id}', [HomeController::class,'show'])->name('posts.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('all-post', function () {
//     $category = Category::get();
//     $data = Post::where('id',$id)->first();
//     return view('Posts.edit', ['data'=>$data,'category'=>$category]);
// });
// Route::post('category/${id}', [CategoryController::class,'update'])->name('category.update');
// Route::post('category/${id}', [CategoryController::class,'destroy'])->name('category.delete');
// Route::get('category/${id}/edit', [CategoryController::class,'edit'])->name('category.edit');
// Route::post('category', [CategoryController::class,'store'])->name('category.store');
// Route::get('category/create', [CategoryController::class,'create'])->name('category.create');
// Route::get('category', [CategoryController::class,'index'])->name('category.index');
// Route::get('category/${id}',[CategoryController::class,'show'])->name('category.show');
Route::resource('comment',CommentController::class);
Route::resource('category',CategoryController::class);
// Route::redirect("/","/post");
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';