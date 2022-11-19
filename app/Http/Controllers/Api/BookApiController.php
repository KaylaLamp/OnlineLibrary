<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::when($request->has('bookname'), function($query) use ($request) {
            $query->whereName($request->get('bookname'));
        })->when($request->has('author'), function($query) use ($request) {
            $query->whereIn('authors.name', $request->get('author'));
        });


        if ($books) {
            return response()->json([
                'status' => true,
                'books'  => $books->get()->toArray(),
            ], 200);
        }
        return response()->json([
            'status' => true,
            'books'  => $books->get()->toArray(),
        ], 404);
    }
}
