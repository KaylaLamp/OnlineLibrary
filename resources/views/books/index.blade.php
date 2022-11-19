@extends('layout')

@section('content')
    <div class="row">
        <h1 class="title">Books</h1>
        <a href="{{ route('books.create') }}" class="button is-primary">Add book</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Authors</th>
                <th>Date Added</th>
                <th>Last Updated</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show',$book->id) }}">{{ $book->name }}</a>
                    </td>
                    <td>
                        @foreach($book->authors as $author)
                            @if($loop->last)
                                <a href="{{ route('authors.show',$author->id) }}">{{ $author->fullName }}</a>
                            @else
                                <a href="{{ route('authors.show',$author->id) }}">{{ $author->fullName }}</a>,
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $book->created_at->diffForHumans() }}</td>
                    <td>{{ $book->updated_at->diffForHumans() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are currently no books.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $books->links() }}
        <a href="{{ route('books.create') }}" class="button is-primary">Add book</a>
    </div>
@endsection
