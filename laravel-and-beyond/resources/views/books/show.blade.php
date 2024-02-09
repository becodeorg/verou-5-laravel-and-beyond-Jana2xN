<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>{{ $book->title }}</h2>
    <p>{{ $book->author }}</p>
    <p>{{ $book->description }}</p>
    <p>Category: {{ $book->category }}</p>

    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
    
    <!-- Add a delete form -->
    <form action="{{ route('books.destroy', $book->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this book?')">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    
    <a href="{{ route('books.index') }}">Back to List</a>
@endsection
