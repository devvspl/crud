<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PdfController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/create', [ProductController::class, 'create']);
Route::post('/save-product', [ProductController::class, 'store']);
Route::get('/product/view/{id}', [ProductController::class, 'view']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/edit-product/{id}', [ProductController::class, 'update']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('list', [ProductController::class, 'dataTableLogic']);
Route::get('send', [ProductController::class, 'sendNotification']);
Route::get('/print',    [PdfController::class, 'print']);
Route::resource('/posts', PostController::class);
Route::prefix('page')->group(function (){
    Route::get('/about', function () {
        return "<h1>About Page</h1>";
    })->name('about');
    Route::get('/contact', function () {
       return "<h1>Contact Page</h1>";
    });
    Route::get('/services', function () {
        return "<h1>Services Page</h1>";
    });
    Route::get('/portfolio', function () {
       return "<h1>Portfolio Page</h1>";
    });
    Route::get('/javascript', function () {
        return view('pages.javascript');
    });
});
Route::fallback(function (){
   return view('error.404');
});

