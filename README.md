# [TailwindCraft](https://tailwindcraft.com) - UI Components made with Tailwind CSS

Discover TailwindCraft, open-source UI components based on Tailwind CSS for effortless and efficient project development.

## Setup Instructions

To get started with SpladePanel, follow these steps:

1.  Install the required dependencies using Composer:

    ```php
    composer install
    ```
2. Copy the `.env.example` file to `.env`:

    ```php
    cp .env.example .env
    ```

3. Generate a security key and link the storage file:

    ```php
    php artisan key:generate
    php artisan storage:link
    ```
5.  Configure your database connection by updating the `.env` file.
6.  Run database migrations and seed initial data:

    ```php
    php artisan migrate
	php artisan db:seed
     ```
8. Start server:
    ```php
    php artisan serve
     ```
