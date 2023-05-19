<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in
many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache)
  storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all
modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a
modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video
tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging
into our comprehensive video library.

## Requirement for this project

<ul>
<li>PHP (version 8.0 or later)</li>
<li>Composer</li>
<li>Node.js (version 14 or later)</li>
<li>npm (usually installed with Node.js)</li>
<li>MySQL or any other supported database system</li>
</ul>

## Setting up your development environment

Clone the project repository to your local machine:

```
git clone https://github.com/kowelt/kowelt.git
```

Change into the project directory:

```
cd kowelt
```

Install PHP dependencies using Composer:

```
composer install
```

Create a copy of the .env.example file and rename it to .env:

```
cp .env.example .env
```

**Warning**
Don't ever commit this file

Generate an application key:

```
php artisan key:generate
```

Configure the .env file with your database credentials and other necessary settings.

Run database migrations to create the required tables:

```
php artisan migrate
```

(Optional) Seed the database with sample data:

```
php artisan db:seed
```

Install JavaScript dependencies using npm:

```
npm install
```

Build frontend assets:

```
npm run dev
```

## Mailer configuration

create an account in mailtrap for development purposes and configure values for
<table>
  <thead>
    <tr>
      <th>Field</th>
      <th>Value</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>MAIL_MAILER</td>
      <td>smtp</td>
    </tr>
    <tr>
      <td>MAIL_HOST</td>
      <td>sandbox.smtp.mailtrap.io</td>
    </tr>
    <tr>
      <td>MAIL_PORT</td>
      <td>your mail port </td>
    </tr>
<tr>
      <td>MAIL_USERNAME</td>
      <td>your mail user name</td>
    </tr>
    <tr>
      <td>MAIL_PASSWORD</td>
      <td>your mail password</td>
    </tr>
<tr>
      <td>MAIL_ENCRYPTION</td>
      <td>tsl</td>
    </tr>
  </tbody>
</table>

Start the server:

```
php artisan serve
```


Open your browser and access the application at http://localhost:8000 (or the URL shown in the terminal).


## Deploy to production ( Hostinger)


## Clone Your Git Repository:

In the file manager, locate the root directory of your website.
Click on the "Terminal" or "Console" option to open a terminal session within the file manager.
Use the git clone command to clone your Laravel project from the Git repository. For example:
```bash
git clone https://github.com/kowelt/kowelt.git
```

Note the . at the end to clone the repository directly into the current directory.


or use Hostinger Interface to clone the project

## Install Composer Dependencies:

In the terminal, navigate to the Laravel project directory that you just cloned.
Run the following command to install Composer dependencies:
bash
````
composer install --optimize-autoloader --no-de
````

## Configure Your .env File :

Rename the .env.example file to .env ( only if it is teh first deployment) :
````
mv .env.example .env
````

Open the .env file and update the necessary environment variables, including the database connection details.
Generate Application Key:

Generate a new application key by running the following command:
````
php artisan key:generate --force
````


## Run Database Migrations to update your database:

While still in the Laravel project directory, run the following command to migrate your database tables:

``````
php artisan migrate --force
``````
## Set Up Web Server:

<ul>
<li>Configure your web server to point to the public directory of your Laravel project.
</li>
<li>we use .htaccess file.
</li>
</ul>

## Test Your Application:

Visit your website's URL in a web browser to test if your Laravel application is running correctly on Hostinger.


## Configure webhooks for automatic deployment when pushing code to your master branch
