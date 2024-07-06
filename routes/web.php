<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PdfController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::post('/save-product', [ProductController::class, 'store']);
Route::get('/product/view/{id}', [ProductController::class, 'view']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/edit-product/{id}', [ProductController::class, 'update']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('list', [ProductController::class, 'dataTableLogic']);
Route::get('send', [ProductController::class, 'sendNotification']);
Route::get('/print',    [PdfController::class, 'print']);
//Route::resource('product', ProductController::class);
Route::resource('posts', PostController::class);
