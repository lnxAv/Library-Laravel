<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ViewController
{
    protected $_BookController;

    public function __construct()
    {
    }

    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function message()
    {
        return view('messages');
    }

    public function new()
    {
        return view('new');
    }

    public function form()
    {
        return view('form');
    }

    public function book(Request $request){
        return view('book');
    }
}

