@extends('layout')

@section('content')
    <h1 class="title">Edit {{ $author->name }}</h1>
    <form method="POST" action="{{ route('authors.update', $author->id) }}">
        @method('PATCH')
        @include('authors.partials._form', ['buttonText' => 'Update'])
    </form>
@endsection
