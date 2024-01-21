<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BeatController;

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

// Endpoint pour liker un post
Route::post('/posts/{post}/like', [PostController::class, 'like']);

// Endpoint pour liker un beat
Route::post('/beats/{beat}/like', [BeatController::class, 'like']);

// Endpoint pour créer un beat
Route::post('/beats', [BeatController::class, 'store']);

// Endpoint pour créer un post
Route::post('/posts', [PostController::class, 'store']);
