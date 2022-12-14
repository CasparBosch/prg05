<?php

use App\Http\Controllers\admin;
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

//Route::resource('positions', ItemController::class);

Route::post('position/search', [ItemController::class, 'search'])->name('position.search');

Route::middleware(['auth'])->group(function (){
    Route::resource('positions', ItemController::class);
});

Route::middleware(['auth','role_admin'])->group(function (){
    Route::resource('admin', admin::class);

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
