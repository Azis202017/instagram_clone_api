<?php

use App\Http\Controllers\PostInstagramController;
use App\Http\Controllers\StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class,'index']);

    Route::post('/user/post/create', [PostInstagramController::class,'create']);
    Route::post('/user/story/create', [StoryController::class,'create']);




});
Route::get('/user/post/', [PostInstagramController::class,'index']);
Route::get('/user/story/', [StoryController::class,'index']);

Route::post('/register', [UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);
