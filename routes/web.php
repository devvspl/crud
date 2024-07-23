<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PageController;
function  getUsers()
{
  return [
      1 => ['name'=> "Rahul", 'email' => "rahul@gmail.com", 'created_at' => "2022-01-01 00:00:00"],
      2 => ['name'=> "Sahil", 'email' => "sahil@gmail.com", 'created_at' => "2022-01-01 00:00:00"],
      3 => ['name'=> "Vikash", 'email' => "vikash@gmail.com", 'created_at' => "2022-01-01 00:00:00"],
  ];
}
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
Route::get('/users', function (){
    $getUsers = getUsers();
    return view('users', ['users' => $getUsers]);
});
Route::get('user/{id}', function ($id) {
    $users = getUsers();
    abort_if(!isset($users[$id]), 404);
    $user = $users[$id] ?? null;
    return view('user', ['user' => $user]);
})->name('view.user');
Route::get('show-user', [PageController::class, 'showUser']);
Route::fallback(function (){
   return view('error.404');
});

