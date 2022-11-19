@extends('layout')

@section('content')
    <h1 class="title">View {{ $author->name }}</h1>
    <label class="label" for="name">Name</label>
    <input class="input" name="name" type="text" readonly value="{{ $author->fullName }}"/>
    <label class="label" for="authors">Books</label>
    @foreach($author->books as $book)
        @if($loop->last)
            <a href="{{ route('books.show',$book->id) }}">{{ $book->name }}</a>
        @else
            <a href="{{ route('books.show',$book->id) }}">{{ $book->name }}</a>,
        @endif
    @endforeach
    <div class="button-group">
        <a href="{{ route('authors.index') }}" class="button is-primary">Back</a>
        <a href="{{ route('authors.edit', $author->id) }}" class="button is-warning">Edit Author</a>
        <form method="POST" action="{{ route('authors.destroy', $author->id) }}">
            @csrf
            @method('DELETE')
            <button class="button is-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection
