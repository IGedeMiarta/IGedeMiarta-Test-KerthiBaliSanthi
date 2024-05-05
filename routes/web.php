<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('livewire/update', function (Request $request) {
    $page = $request->input('page');
    return redirect('/book?page=' . $page);
});