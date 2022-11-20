<?php

    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Models\Author;
    use App\Transformers\AuthorTransformer;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;

    class AuthorApiController extends Controller {
        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request) {
            $errors = false;
            $data = json_decode($request->getContent(), true);

            // Ensure first_name and last_name fields are not null
            if (!isset($data['first_name'])) {
                $errors[] = 'first_name is required';
            } else if (Str::length($data['first_name']) > 50) {
                $errors[] = 'first_name is too long, needs to be less than 50 characters';
            }
            if (!isset($data['last_name'])) {
                $errors[] = 'last_name is required';
            } else if (Str::length($data['last_name']) > 50) {
                $errors[] = 'last_name is too long, needs to be less than 50 characters';
            }

            if (!$errors) {
                // If there are no errors with the data, create the author
                $authorCreated = Author::create($data);

                // If the author is created successfully, return success and author_id
                if ($authorCreated) {
                    return response()->json([
                        'status'  => true,
                        'message' => 'Author added successfully',
                        'author' => fractal($authorCreated, new AuthorTransformer())
                    ]);
                }
                return response()->json([
                   'status' => false,
                    'message' => 'Unable to add author'
                ], 500);
            }

            return response()->json([
                'status'  => false,
                'errors' => $errors,
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

            if (!empty($author)) {
                return response()->json([
                    'status' => true,
                    'author' => fractal($author, new AuthorTransformer())->parseIncludes('books')
                ], 200);
            }

            return response()->json([
                'status' => false,
            ], 404);
        }
    }
