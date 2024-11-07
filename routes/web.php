<?php

use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\LocalMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([LocalMiddleware::class])->group(function () {
    Route::get('/', [ViewController::class, 'index'])->name('home');

    Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

    Route::get('/message', [ViewController::class, 'message'])->name('message');

    Route::get('/new', [ViewController::class, 'new'])->name('new');

    Route::get('/form', [ViewController::class, 'form'])->name('form-book');

    Route::get('/book/{isbn}', [ViewController::class, 'book'])->name('book');
});

Route::get('/settings/{locale}', [SettingsController::class, 'changeLanguage'])->name('local.settings');
