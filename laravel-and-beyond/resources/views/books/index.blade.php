<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Book Library</h2>

    @foreach ($books as $book)
        <div>
            <h3>{{ $book->title }}</h3>
            <p>{{ $book->author }}</p>
            <a href="{{ route('books.show', $book->id) }}">View Details</a>
        </div>
    @endforeach
@endsection