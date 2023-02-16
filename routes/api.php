<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController as PostV1;
use App\Http\Controllers\Api\V2\PostController as PostV2;
use App\Http\Controllers\Api\LoginController;
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

Route::apiResource('v1/posts', PostV1::class)->only(['show', 'index', 'destroy'])->middleware('auth:sanctum');
Route::apiResource('v2/posts', PostV2::class)->only(['show', 'index'])->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);
