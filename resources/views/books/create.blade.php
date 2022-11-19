@extends('layout')

@section('content')
    <h1 class="title">Create Book</h1>
    <form method="POST" action="{{ route('books.store') }}">
            @include('books.partials._form', ['buttonText' => 'Create'])
    </form>
@endsection
