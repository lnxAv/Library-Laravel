<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'index'])->name('home');

Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Route::get('/message', [ViewController::class, 'message'])->name('message');

Route::get('/new', [ViewController::class, 'new'])->name('new');

Route::get('/form', [ViewController::class, 'form'])->name('form-book');

Route::get('/book/{isbn}', [ViewController::class, 'book'])->name('book');
