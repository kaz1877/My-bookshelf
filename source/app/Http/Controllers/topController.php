<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class topController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->take(5)->get();

        return view('home', compact('books'));
    }
}
