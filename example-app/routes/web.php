<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/position1', function () {
    return view('position1', [
        'position1' => '<h1>Hello World</h1>'
    ]);
});

Route::get('/position2', function () {
    return view('position2');
});

Route::get('/position3', function () {
    return view('position3');
});