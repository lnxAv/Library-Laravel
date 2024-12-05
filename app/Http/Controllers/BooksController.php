<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BooksController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pages' => 'required|string|max:255',
            'price' => 'required|string|max:255',
        ];
        $test = $request->validate($rules);
        if ($test) {
            $book = new Book($test);
            $book->save();
            return redirect()->route('home');
        } else {
            return redirect()->route('form-book');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $book = Book::find($request->id);
        return view('book', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
