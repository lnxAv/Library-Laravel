<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MessagesController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\json;

Route::domain('api.' . env('APP_URL'))->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('books')->group(function () {
            //GET api/v1/books
            Route::get('/', BookController::class . '@getBooks')->name('api.v1.books.get');
            //GET api/v1/books/{isbn}
            Route::get('/{isbn}', BookController::class . '@getBooksById')->name('api.v1.books.get');
            //POST api/v1/books
            Route::post('/', BookController::class . '@postBook')->name('api.v1.books.post');
            //DELETE api/v1/books/{isbn}
            Route::delete('/{isbn}', BookController::class . '@deleteBook')->name('api.v1.books.delete');
        });

        Route::prefix('messages')->group(function () {
            //GET api/v1/messages
            Route::get('/', MessagesController::class . '@getMessages')->name('api.v1.messages.get');
            //POST api/v1/messages
            Route::post('/', MessagesController::class . '@postMessage')->name('api.v1.messages.post');
        });
    });
});

