<?php

use App\Http\Controllers\AuthorController;
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
    // return view('welcome');
    return redirect()->route('author.index');
});

Route::prefix('author')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/search', [AuthorController::class, 'search'])->name('author.search');
    Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('/update/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
});
