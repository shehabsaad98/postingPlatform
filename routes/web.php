<?php

use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;




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

Route::post('newsletter', NewsLetterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
// creating an account
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
// logging out and redirect to home page
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
// get the login page
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
// submit a comment 
Route::post('posts/{poster:slug}/comments', [CommentController::class, 'store']);
// add a post 
Route::get('admins/posts/create', [PostController::class, 'create']);
Route::post('admins/posts', [PostController::class, 'store']); 
