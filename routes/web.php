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
    
    Route::get('/admin/add/form', [AdminController::class, 'addDeviceForm'])->name('device.add');
    Route::post('/admin/add', [AdminController::class, 'saveDevice'])->name('device.save');
    
    Route::get('/admin/{device}/edit/form', [AdminController::class, 'editDeviceForm'])->name('device.edit');
    Route::patch('/admin/{device}/edit', [AdminController::class, 'updateDevice'])->name('device.update');
    
    Route::get('/admin/{device}/delete', [AdminController::class, 'deleteDeviceForm'])->name('device.delete');
    Route::post('/admin/{device}', [AdminController::class, 'destroyDevice'])->name('device.destroy');
});
