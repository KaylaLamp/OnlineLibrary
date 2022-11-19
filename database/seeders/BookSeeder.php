<?php

    namespace Database\Seeders;

    use App\Models\Author;
    use Illuminate\Database\Seeder;
    use App\Models\Book;

    class BookSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            Book::factory()
                ->count(30)
                ->create();
        }
    }
