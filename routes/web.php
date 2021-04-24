<?php
namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubCommentController;
use App\Http\Controllers\CommentLikeController;


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

Route::get('/', [PostController::class, 'redir']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/explorer', [PostController::class, 'index'])->name('global');
Route::post('/posts', [PostController::class, 'store'])->name('posts');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts-destroy');
Route::get('/posts/{post_id}/edit', [PostController::class, 'edit'])->name('posts-edit');
Route::put('/posts/{post_id}/edit', [PostController::class, 'update'])->name('posts-update');


// Profile
Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile-edit');
Route::put('/profile/edit', [UserController::class, 'update']);
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::put('/account', [UserController::class, 'avatar'])->name('account.post');

//user profile
Route::get('/profile/{id}/users', [UserController::class, 'userProfile'])->name('user.profile');
Route::get('/profile/{id}/users/following', [FollowController::class, 'userFollowing'])->name('user.following');
Route::get('/profile/{id}/users/followers', [FollowController::class, 'userFollowers'])->name('user.followers');
Route::post('/profile/{id}/users/follow', [UserController::class, 'follow'])->name('user.follow');
Route::delete('/profile/{id}/users/follow', [UserController::class, 'unfollow'])->name('user.unfollow');

// Profile Follow
Route::get('/profile/following', [FollowController::class, 'following'])->name('following');
Route::get('/profile/followers', [FollowController::class, 'followers'])->name('followers');


Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('likes');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('likes.delete');

Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.post');

Route::get('/comments/{comments}/sub_comments', [SubCommentController::class, 'index'])->name('SubComments');
Route::post('/comments/{comments}/sub_comments', [SubCommentController::class, 'store'])->name('SubComments.post');

Route::post('/comments/{comment}/likes', [CommentLikeController::class, 'store'])->name('comments.likes');
Route::delete('/comments/{comment}/likes', [CommentLikeController::class, 'destroy'])->name('comments.likes.delete');

