<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoControler;

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

Route::get('/', [TodoControler::class, 'index'])->name('home');
Route::post('/new', [TodoControler::class, 'new']);
Route::post('/destroy', [TodoControler::class, 'destroy']);
// Route::post('/uncomplete', [TodoControler::class, 'uncomplete']);
Route::post('/complete', [TodoControler::class, 'complete']);
// Route::put('complete/{id}', 'TodoControler@complete');

