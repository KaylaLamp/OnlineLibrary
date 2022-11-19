@extends('layout')

@section('content')
    <h1 class="title">Edit {{ $book->name }}</h1>
    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @method('PATCH')
        @include('books.partials._form', ['buttonText' => 'Update'])
    </form>
@endsection
