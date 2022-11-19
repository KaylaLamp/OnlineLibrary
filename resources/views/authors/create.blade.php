@extends('layout')

@section('content')
    <h1 class="title">Create Author</h1>
    <form method="POST" action="{{ route('authors.store') }}">
            @include('authors.partials._form', ['buttonText' => 'Create'])
    </form>
@endsection
