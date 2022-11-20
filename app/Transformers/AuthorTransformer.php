<?php

namespace App\Transformers;

use App\Models\Author;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        'books'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Author $author)
    {
        return [
            'author_id' => (int) $author->id,
            'author_name' => $author->fullName
        ];
    }

    /**
     * Include Books
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeBooks(Author $author)
    {
        $books = $author->books;

        return $this->collection($books, new BookTransformer());
    }
}
