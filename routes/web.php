<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Auth::routes();


Route::resource('article', ArticleController::class);
Route::delete('delete/{id}', [ArticleController::class, 'destroy']);
Route::delete('deleteImage/{id}', [ArticleController::class, 'destroyImage']);
Route::delete('deleteCover/{id}', [ArticleController::class, 'destroyCover']);
Route::put('update/{id}', [ArticleController::class, 'update']);
Route::get('edit/{id}', [ArticleController::class, 'edit']);
Route::get('show/{id}', [ArticleController::class, 'show'])->name('show');

Route::get('search', [HomeController::class, 'searchPost'])->name('search');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [HomeController::class, 'adminView'])->name('admin');
});

