<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware('auth','CheckRole:admin')->group(function () {
    //route book admin
    Route::get('/create', [BookController::class, 'create'])->name("book-create");
    Route::post('/store', [BookController::class, 'store'])->name("book-store");
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name("book-edit");
    Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name("book-delete");
    Route::put('/update/{id}', [BookController::class, 'update'])->name("book-update");
    //Route::view('/home','home', ['name' => 'cara ibnu']);

});


Route::middleware('auth','CheckRole:admin,user')->group(function () {
    //route book admin and user
    Route::get('/index', [BookController::class, 'index'])->name("book-index");
    Route::get('/show/{id}', [BookController::class, 'show'])->name("book-show");

    //Route::view('/home','home', ['name' => 'cara ibnu']);

    //route dashboard admin and user
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();