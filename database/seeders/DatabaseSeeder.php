<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
        ]);

        $authors = Author::all();

        // Attach up to 2 authors to each book
        Book::all()->each(function ($book) use ($authors) {
            $book->authors()->attach(
                $authors->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
