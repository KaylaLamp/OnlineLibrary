@extends('layout')

@section('content')
    <h1 class="title">Welcome to the book store!</h1>
    <div class="columns">
        <div class="column"><a href="{{ route('books.index') }}">View Books</a></div>
        <div class="column"><a href="{{ route('authors.index') }}">View Authors</a></div>
    </div>
@endsection
