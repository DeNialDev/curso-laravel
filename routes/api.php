<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('post/all' ,[\App\Http\Controllers\Api\PostController::class, 'all']);
Route::get('post/slug/{slug}' ,[\App\Http\Controllers\Api\PostController::class, 'slug']);
Route::get('category/all' ,[\App\Http\Controllers\Api\CategoryController::class, 'all']);
Route::get('category/{category}/post' ,[\App\Http\Controllers\Api\CategoryController::class, 'posts']);
Route::get('category/slug/{slug}' ,[\App\Http\Controllers\Api\CategoryController::class, 'slug']);

Route::resource('category', \App\Http\Controllers\Api\CategoryController::class)->except(['create', 'edit']);
Route::resource('post', \App\Http\Controllers\Api\PostController::class)->except(['create', 'edit']);
