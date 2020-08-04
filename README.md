# Code Challenge - My Postcard

it's a project that consumes the MyPostcard api that displays a list of postcards with the following characteristics

- OOP Approach
- Create a page with a basic Bootstrap 4 Table on it (Thumbnail, Title, Price (formatted for Euro currency)).
- The 4th row should have a different background color (adding a new class to this row -> inside the PHP loop) 
- Paginated list (25 items).
- Resize the Thumbnail  on-the-fly to width=200 (via PHP script which dynamically serves the image)
- Drop/down button to change price option.
- Generator pdf with the postcard (tcpdf).


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

The prerequisites are the same that laravel 7

```
PHP >= 7.2.5
BCMath PHP Extension
Ctype PHP Extension
Fileinfo PHP extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension
```

### Installing

Follow the steps to install the proyect:

Clone GitHub repo for this project locally
```
git clone https://github.com/mmmoises/MyPostcard.git
```

Access to proyect directory
```
cd MyPostcard
```

Install Composer Dependencies
```
composer install
```

Install NPM Dependencies
```
npm install
```

Create a copy of your .env file
```
cp .env.example .env
```

Generate an app encryption key
```
php artisan key:generate
```

enable the server
```
php artisan serve
```



## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Jquery/Ajax](https://jquery.com/) - library

## Authors

* **Moises Morales** - [CoffeeCups](https://github.com/mmmoises)


