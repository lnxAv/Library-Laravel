<?php

use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\MessagesController;
use App\Http\Middleware\LocalMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([LocalMiddleware::class])->group(function () {
    // # Views
    Route::get('/', [BooksController::class, 'index'])->name('home');
    Route::get('/book/{id}', [BooksController::class, 'show'])->name('display-book');
    Route::get('/book/form', [ViewController::class, 'form'])->name('form-book');
    Route::get('/contact', [ViewController::class, 'contact'])->name('contact');
    Route::get('/message', [MessagesController::class, 'index'])->name('message');

    Route::get('/new', [ViewController::class, 'new'])->name('new');
});

// # ACTIONS
// -- Books
Route::post('/api/books', [BooksController::class,'store'])->name('post-book');

// -- Messages
Route::post('/api/messages', [MessagesController::class,'store'])->name('post-message');
Route::delete('/api/messages/{id}', [MessagesController::class,'destroy'])->name('delete-message');


// -- Localization
Route::get('/settings/{locale}', [SettingsController::class, 'changeLanguage'])->name('local.settings');
