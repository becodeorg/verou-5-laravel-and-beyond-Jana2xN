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

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'category' => 'nullable',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('book_covers', 'public');
        } else {
            $imagePath = null;
        }

        // Create a new book record
        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'cover_image' => $imagePath,
        ]);

        // Redirect to the book listing page
        return redirect('/books')->with('success', 'Book added successfully!');
    }
    
    public function edit($id)
    {
        // Find the book by its ID
        $book = Book::findOrFail($id);

        // Return the view for editing the book
        return view('books.edit', compact('book'));
    }
}
