<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIPostController;
use App\Http\Controllers\APICommentController;
use App\Http\Controllers\APILikeController;
use App\Http\Controllers\APIAccountController;
use App\Http\Controllers\APIPeopleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public routes
Route::post('/register', [APIAuthController::class, 'register']);
Route::post('/login', [APIAuthController::class, 'login']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function() {

    // User
    Route::get('/user', [APIAuthController::class, 'user']);
    Route::put('/user', [APIAuthController::class, 'update']);
    Route::post('/logout', [APIAuthController::class, 'logout']);

    // Post
    Route::get('/posts', [APIPostController::class, 'index']); // all posts
    Route::post('/posts', [APIPostController::class, 'store']); // create post
    Route::get('/posts/{id}', [APIPostController::class, 'show']); // get single post
    Route::put('/posts/{id}', [APIPostController::class, 'update']); // update post
    Route::delete('/posts/{id}', [APIPostController::class, 'destroy']); // delete post

    //account
    Route::get('/account', [APIAccountController::class, 'index']); // all posts
    Route::post('/account/{id}', [APIAccountController::class, 'tenant']); // get single post

    //people
    Route::get('/people/{id}', [APIPeopleController::class, 'index']); // all posts
    Route::get('/people/{tenant}/{id}', [APIPeopleController::class, 'show']); // all posts

    // Comment
    Route::get('/posts/{id}/comments', [APICommentController::class, 'index']); // all comments of a post
    Route::post('/posts/{id}/comments', [APICommentController::class, 'store']); // create comment on a post
    Route::put('/comments/{id}', [APICommentController::class, 'update']); // update a comment
    Route::delete('/comments/{id}', [APICommentController::class, 'destroy']); // delete a comment

    // Like
    Route::post('/posts/{id}/likes', [APILikeController::class, 'likeOrUnlike']); // like or dislike back a post
});