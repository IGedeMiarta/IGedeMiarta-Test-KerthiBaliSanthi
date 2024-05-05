<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect()->route('book');
});

Route::resource('/book', BookController::class)->names([
    'index' => 'book',
]);
Route::resource('/author', AuthorController::class)->names([
    'index' => 'author',
    'update'=> 'author.update',
    'destroy'=> 'author.delete'
]);
Route::resource('/category', CategoryController::class)->names([
    'index' => 'category',
    'update'=> 'category.update',
    'destroy'=> 'category.delete'
]);

