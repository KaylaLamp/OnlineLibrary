<?php

namespace App\Transformers;

use App\Models\Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
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
        'authors'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Book $book)
    {
        return [
            'book_id' => (int) $book->id,
            'book_name' => $book->name
        ];
    }

    /**
     * Include Authors
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeAuthors(Book $book)
    {
        $authors = $book->authors;

        return $this->collection($authors, new AuthorTransformer());
    }
}
