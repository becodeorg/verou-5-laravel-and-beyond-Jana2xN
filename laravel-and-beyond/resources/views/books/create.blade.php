<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Add a New Book</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Book form -->
    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
        <br>
        <label for="category">Category:</label>
        <input type="text" name="category">
        <br>
        <label for="cover_image">Cover Image:</label>
        <input type="file" name="cover_image">
        <br>
        <button type="submit">Add Book</button>
    </form>

    <a href="{{ route('books.index') }}">Back to List</a>
@endsection
