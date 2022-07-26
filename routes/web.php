<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::post('search', [SearchController::class, 'searchPost'])->name('search');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['admin']], function () {
    Route::delete('delete/{id}', [ArticleController::class, 'destroy']);
    Route::delete('deleteImage/{id}', [ArticleController::class, 'destroyImage']);
    Route::delete('deleteCover/{id}', [ArticleController::class, 'destroyCover']);
    Route::put('update/{id}', [ArticleController::class, 'update']);
    Route::get('edit/{id}', [ArticleController::class, 'edit']);
    Route::get('show/{id}', [ArticleController::class, 'show'])->name('show');

    Route::get('admin', [HomeController::class, 'adminView'])->name('admin');
});

