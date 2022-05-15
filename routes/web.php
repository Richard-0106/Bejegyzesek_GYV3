<?php

use App\Http\Controllers\BejegyzesController;
use App\Http\Controllers\TevekenysegController;
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
    return view('tevekenyseg');
});
Route::get('/user', [UserController::class,'index']);
Route::get('/molly',[BejegyzesController::class,'index']);
Route::get('/molly/{osztaly_id}',[BejegyzesController::class,'osztaly']);
Route::post('/molly', [BejegyzesController::class,'store']);

Route::get('/roki',[TevekenysegController::class,'index']);

Route::get('/kereses',[BejegyzesController::class,'f']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
