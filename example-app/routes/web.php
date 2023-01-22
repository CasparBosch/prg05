<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('position/search', [ItemController::class, 'search'])->name('position.search');

Route::middleware(['auth'])->group(function (){
    Route::resource('positions', ItemController::class);
    Route::get('/changeStatus', [itemController::class, 'updateVisibility'])->name('positions.visibility-update');
});
Route::middleware(['auth','role_admin'])->group(function (){
    Route::resource('admin', admin::class);

});

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('home/search', [HomeController::class, 'search'])->name('home.search');
