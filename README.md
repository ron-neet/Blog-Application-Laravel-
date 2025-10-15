# Blog Application

A simple and modern blog application built using **Laravel 12** and **Laravel Breeze** for authentication and frontend scaffolding. This application allows users to register, login, create, edit, and delete blog posts, and view posts from other users.

---

## Features

- **User Authentication**  
  - Register, login, and logout using Laravel Breeze.
  - Password reset functionality.
- **Blog Management**
  - Create, edit, and delete blog posts.
  - Rich text editor support (optional).
- **Public Access**
  - View all published blog posts without login.
  - Search and filter posts by title or category.
- **Responsive Design**
  - Mobile-friendly layout using Tailwind CSS (via Breeze).

---

## Installation

Install dependencies:

bash
Copy code
composer install
npm install
npm run dev
Copy .env file and set your environment variables:

bash
Copy code
cp .env.example .env
php artisan key:generate
Configure your database in .env:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_app
DB_USERNAME=root
DB_PASSWORD=
Run migrations and seeders:

bash
Copy code
php artisan migrate --seed
Start the development server:

bash
Copy code
php artisan serve
Visit http://127.0.0.1:8000 in your browser.

Folder Structure
app/Models – Eloquent models for Users and Posts.

app/Http/Controllers – Controllers for authentication and blog management.

resources/views – Blade templates for frontend pages.

routes/web.php – Web routes.

database/migrations – Database schema for users and posts.

database/seeders – Seeders to populate initial data.

Technologies Used
PHP 8.4

Laravel 12

Laravel Breeze (authentication + Blade + Tailwind CSS)

MySQL

Tailwind CSS

JavaScript (optional enhancements)

Contribution
Feel free to open issues or submit pull requests. Make sure to follow the PSR-12 coding standard.
