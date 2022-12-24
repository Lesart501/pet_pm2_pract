<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/{device}/book', [HomeController::class, 'bookForm'])->name('book.form');
Route::post('/home/{device}', [HomeController::class, 'book'])->name('book');

Route::middleware(['admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
});
