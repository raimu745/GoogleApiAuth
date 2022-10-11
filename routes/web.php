<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\GoogleController;
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

Route::get('google',[GoogleController::class,'gsub']);
Route::get('gbtn',[GoogleController::class,'index']);

Route::get('callback',[GoogleController::class,'callback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::view('form','form');


Route::post('form_submit',[FormController::class,'sub']);


Route::prefix('admin')->group(function () {
    Route::get('form',[FormController::class,'index']);
});
