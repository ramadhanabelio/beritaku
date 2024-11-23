<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    $posts = \App\Models\Post::latest()->get();
    return view('landing-page', compact('posts'));
});

Route::get('posts', [PostController::class, "index"]);
Route::get("create", [PostController::class, "create"]);
Route::post('store', [PostController::class, "store"]);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::get('posts/{id}/edit', [PostController::class, 'edit']);
Route::put('posts/{id}', [PostController::class, 'update']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);
