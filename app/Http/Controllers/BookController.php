<?php

    namespace App\Http\Controllers;

    use App\Models\Author;
    use App\Models\Book;
    use App\Http\Requests\StoreBookRequest;
    use App\Http\Requests\UpdateBookRequest;

    class BookController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {
            $books = Book::latest()->paginate(20);

            return view('books.index', compact('books'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create() {
            $book    = new Book();
            $authors = Author::all();

            return view('books.create', compact('book', 'authors'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \App\Http\Requests\StoreBookRequest $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(StoreBookRequest $request) {
            $request->validate([
                'name'    => 'required',
                'authors' => 'required|array|min:1|max:2',
            ]);

            $book = Book::create($request->all());
            $book->authors()->sync($request->authors);

            return redirect()->route('books.index')
                             ->with('success', 'Book successfully saved');
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\Book $book
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Book $book) {
            return view('books.show', compact('book'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\Book $book
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Book $book) {
            $authors = Author::all();

            return view('books.edit', compact('book', 'authors'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \App\Http\Requests\UpdateBookRequest $request
         * @param \App\Models\Book $book
         *
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateBookRequest $request, Book $book) {
            $request->validate([
                'name'    => 'required',
                'authors' => 'required|array|min:1|max:2',
            ]);

            $book->update($request->all());
            $book->authors()->sync($request->authors);

            return redirect()->route('books.show', $book->id)
                             ->with('success', 'Book successfully updated');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Book $book
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Book $book) {
            $book->delete();

            return redirect()->route('books.index')
                             ->with('success', 'Book successfully deleted');
        }
    }
