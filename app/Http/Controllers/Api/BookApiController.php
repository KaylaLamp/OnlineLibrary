<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Transformers\BookTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authorName = $request->get('author');
        $books = Book::when($request->has('bookname'), function($query) use ($request) {
            // Only when the request has parameter bookname, search for the specified name
            $query->whereName($request->get('bookname'));
        })->when($request->has('author'), function($query) use ($authorName) {
            // Only hwne the reuqest has parameter author, search for books under the specified author
            $query->whereHas('authors', function($q) use ($authorName) {
                $q->where(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%{$authorName}%");
            });
        });

        // If books exist, return them with a 200 success
        if ($books) {
            return response()->json([
                'status' => true,
                'books'  => fractal($books->get(), new BookTransformer())->parseIncludes('authors'),
            ], 200);
        }
        // Return status false with 404 to say no books were found
        return response()->json([
            'status' => true,
        ], 404);
    }
}
