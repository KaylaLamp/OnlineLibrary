# Library Online

Basic Laravel app to display a book and author management system.

## Steps to set up

1. Clone the repository.
2. Create an `.env` file by copying the `.env.example` file and fill out the details to match your setup.
3. Create a database amd make sure to set it in your `.env` file. 
4. Run `php artisan migrate:fresh` if you want a clean empty database or `php artisan migrate:fresh --seed` if you want dummy data to work with.
5. Run `composer install` and `npm install` to ensure your NPM and Composer packages have been installed and are usable. 
6. To start the local development server, run `npm run dev` and `php artisan serve`
