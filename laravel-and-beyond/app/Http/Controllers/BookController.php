<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // Fetch all books from the database
        $books = Book::all();

        // Return the view with the list of books
        return view('books.index', compact('books'));
    } 

    public function show($id)
    {
        // Find the book by its ID
        $book = Book::findOrFail($id);

        // Return the view with the book details
        return view('books.show', compact('book'));
    }

    public function create()
    {
        // Return the view for adding a new book
        return view('books.create');
    }
}
