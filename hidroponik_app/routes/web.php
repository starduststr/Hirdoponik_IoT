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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');
Route::get('/setup_parameter', [App\Http\Controllers\Setup_sensor::class, 'index'])->name('setup_parameter');

Route::post('/create_parameter', [App\Http\Controllers\Setup_sensor::class, 'create'])->name('create_parameter');
Route::post('/delete_parameter', [App\Http\Controllers\Setup_sensor::class, 'delete'])->name('delete_parameter');
Route::post('/edit_parameter', [App\Http\Controllers\Setup_sensor::class, 'edit'])->name('edit_parameter');


