<?php

    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreAuthorRequest;
    use App\Models\Author;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class AuthorApiController extends Controller {
        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request) {
            $request->validate([
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
            ]);

            $author = Author::create($request->all());

            if ($author) {
                return response()->json([
                    'status' => true,
                    'message' => 'Author added'
                ], 200);
            }

            return response()->json([
                'status' => true,
            ], 500);
        }

        /**
         * Display the specified resource.
         *
         * @param Request $request
         *
         * @return Response
         */
        public function show(Request $request) {
            $author = Author::find($request->route('id'));

            if ($author) {
                return response()->json([
                    'status' => true,
                    'author' => $author,
                    'books'  => $author->books()->pluck('name'),
                ], 200);
            }

            return response()->json([
                'status' => false,
            ], 404);
        }
    }
