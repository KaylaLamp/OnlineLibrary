@extends('layout')

@section('content')
    <div class="row">
        <h1 class="title">Authors</h1>
        <a href="{{ route('authors.create') }}" class="button is-primary">Add author</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Books</th>
            </tr>
            </thead>
            <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>
                        <a href="{{ route('authors.show', $author->id) }}">{{ $author->fullName }}</a>
                    </td>
                    <td>
                        @forelse($author->books as $book)
                            @if ($loop->last)
                                <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
                            @else
                                <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>,
                            @endif
                        @empty

                        @endforelse
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are currently no authors.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $authors->links() }}
        <a href="{{ route('authors.create') }}" class="button is-primary">Add author</a>
    </div>
@endsection
