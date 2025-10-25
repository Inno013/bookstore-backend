<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

// Redirect root ke list books
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Book Routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Author Routes
Route::get('/authors/top', [AuthorController::class, 'topAuthors'])->name('authors.top');

// Rating Routes
Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/api/books-by-author/{author}', [RatingController::class, 'getBooksByAuthor']);
