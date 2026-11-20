# Laravel POS - TFA7

## Forms, Validation, and File Upload

A Laravel Point of Sale (POS) application developed
for IT0049 - Web System Technologies.

This project extends TFA6 by implementing customer
and user forms, server-side validation, and avatar
uploads with image resizing.

## Developer

- Name: Carlo Bismonte
- Course: BSITWMA
- Subject: IT0049 - Web System Technologies
- Activity: TFA7

## Features

### Customer Management

- Display customer records
- Create new customers
- Edit existing customers
- Validate required fields
- Validate email addresses
- Preserve form input after validation errors
- Display validation and success messages

### User Management

- Display user records
- Create new users
- Edit existing users
- Validate unique usernames and emails
- Validate and hash passwords
- Upload optional profile pictures
- Replace existing avatars
- Display default avatar placeholders

### Avatar Upload

- Supported formats: JPG, JPEG, PNG, WebP
- Maximum upload size: 2 MB
- Automatic resizing to 300 x 300 pixels
- Conversion to JPEG
- Unique filenames using UUID
- Storage using Laravel's public disk

## Technologies Used

- PHP
- Laravel
- MySQL
- Blade Templates
- HTML and CSS
- Intervention Image
- Composer
- XAMPP
- Git and GitHub

## Installation

### 1. Clone the repository

git clone https://github.com/carlobismonte/TFA7-Laravel-POS.git

### 2. Open the project

cd TFA7-Laravel-POS

### 3. Install dependencies

composer install

### 4. Configure environment

Copy .env.example to .env.

For Windows PowerShell:

Copy-Item .env.example .env

### 5. Generate application key

php artisan key:generate

### 6. Configure MySQL

Create a database named laravel_pos.

Update the .env database settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_pos
DB_USERNAME=root
DB_PASSWORD=

### 7. Run migrations

php artisan migrate

### 8. Create public storage link

php artisan storage:link

### 9. Start Laravel

php artisan serve

Visit http://127.0.0.1:8000

Note: Existing sample records must be imported
or seeded separately if they are not included
in the repository.

## Application Routes

| URL                  | Description   |
| -------------------- | ------------- |
| /                    | Homepage      |
| /about               | About page    |
| /customers           | Customer list |
| /customers/create    | Add customer  |
| /customers/{id}/edit | Edit customer |
| /users               | User list     |
| /users/create        | Add user      |
| /users/{id}/edit     | Edit user     |

## Validation

Customer forms validate required names and
properly formatted email addresses.

User forms validate required fields, unique
usernames and emails, and password confirmation.

Avatar uploads are restricted to supported image
formats with a maximum size of 2 MB.

## Project Purpose

This project demonstrates Laravel MVC,
Eloquent ORM, database migrations, form handling,
server-side validation, secure file storage,
and image processing.
