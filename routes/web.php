<?php

use App\Http\Controllers\Admin\BookController;
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
    return view('backend.master');
});

Route::get('/create', [BookController::class, 'create'])->name("book-create");

Route::post('/store', [BookController::class, 'store'])->name("book-store");

Route::get('/edit/{id}', [BookController::class, 'edit'])->name("book-edit");

Route::get('/index', [BookController::class, 'index'])->name("book-index");

Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name("book-delete");

Route::put('/update/{id}', [BookController::class, 'update'])->name("book-update");


//Route::view('/home','home', ['name' => 'cara ibnu']);
