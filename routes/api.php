<?php

use App\Http\Controllers\Api\bookcontroller;
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

Route::get('/index', [bookcontroller::class, 'index']);
Route::post('/store', [BookController::class, 'store']);
Route::delete('/delete/{id}', [BookController::class, 'destroy']);