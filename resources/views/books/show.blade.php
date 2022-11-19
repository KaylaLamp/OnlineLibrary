@extends('layout')

@section('content')
    <h1 class="title">View {{ $book->name }}</h1>
    <label class="label" for="name">Book Name</label>
    <input class="input" name="name" type="text" readonly value="{{ $book->name }}"/>
    <label class="label" for="authors">Authors</label>
    @foreach($book->authors as $author)
        @if($loop->last)
            <a href="{{ route('authors.show',$author->id) }}">{{ $author->fullName }}</a>
        @else
            <a href="{{ route('authors.show',$author->id) }}">{{ $author->fullName }}</a>,
        @endif
    @endforeach
    <div class="button-group">
        <a href="{{ route('books.index') }}" class="button is-primary">Back</a>
        <a href="{{ route('books.edit', $book->id) }}" class="button is-warning">Edit Book</a>
        <form method="POST" action="{{ route('books.destroy', $book->id) }}">
            @csrf
            @method('DELETE')
            <button class="button is-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection
