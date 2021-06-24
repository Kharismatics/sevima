<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\CardController;
// use App\Http\Controllers\FileStorageController;
// use App\Http\Controllers\SubDetailController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia\Inertia::render('Dashboard');
// })->name('dashboard');
// // Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
// //     return Inertia\Inertia::render('Home');
// // })->name('home');
Route::get('/home', [PostController::class, 'home'])->name('home')->middleware(['auth:sanctum', 'verified']);
Route::post('/home', [PostController::class, 'home'])->name('mypost')->middleware(['auth:sanctum', 'verified']);

Route::resource('posts', PostController::class)->middleware(['auth:sanctum', 'verified']);

Route::post('/likes', [LikeController::class, 'store'])->name('likes.store')->middleware(['auth:sanctum', 'verified']);
Route::delete('/likes/{likes}', [LikeController::class, 'destroy'])->name('likes.destroy')->middleware(['auth:sanctum', 'verified']);

Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comment.index')->middleware(['auth:sanctum', 'verified']);
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store')->middleware(['auth:sanctum', 'verified']);
// Route::post('/posts/{post}/comments/create', [CommentController::class, 'index'])->name('comment.create')->middleware(['auth:sanctum', 'verified']);
Route::put('/comments/{comments}/edit', [CommentController::class, 'index'])->name('comment.update')->middleware(['auth:sanctum', 'verified']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware(['auth:sanctum', 'verified']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/backtwostep', function () {
//     $links = session()->has('links') ? session('links') : [];
//     $currentLink = request()->path(); // Getting current URI like 'category/books/'
//     array_unshift($links, $currentLink); // Putting it in the beginning of links array
//     session(['links' => $links]);
//     return redirect(session('links')[2]);
// })->name('backtwostep');


// // resource auto
// Route::resource('card', CardController::class)->middleware(['auth:sanctum', 'verified']);

// Route::resource('card.file', FileStorageController::class);
// Route::resource('card.detail', SubDetailController::class, [
//     'parameters' => ['file' => 'file:id','card' => 'card:id'],
// ]);
// // resource manual
// Route::get('/category', [CategoryController::class, 'index'])->name('category.index')->middleware(['auth:sanctum', 'verified']);
// Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware(['auth:sanctum', 'verified']);