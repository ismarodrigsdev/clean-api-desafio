# Simple Laravel Clean API

# Clean API

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Testing](#testing)
- [License](#license)

## Requirements

To run this project, you need to have the following software installed:

- PHP 7.4 or higher
- Composer
- Laravel 8.x
- MySQL or any other compatible database

## Installation

* Clone the repository:
  ```bash
  git clone https://github.com/ismarodrigsdev/clean-api-desafio
  ```
* Navigate to the project directory:
  ```bash
  cd clean-api-desafio
  ```
* Install the dependencies using Composer:
  ```bash
  composer install 
  ```
* Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary environment variables, such as the database configuration.
* Generate an application key:
  ```bash
  php artisan key:generate
  ```
* Run the database migrations:
  ```bash
  php artisan migrate
  ```
* Optionally, you can seed the database with sample products data:
  ```bash
  php artisan db:seed
  ```

## Usage

You can access the API endpoints using an HTTP client or tools like Postman. The available endpoints include:

- `POST /api/v1/auth/register`: Create an User.
- `POST /api/v1/auth/login`: Login with an User.
- `GET /api/v1/products`: Get all products (protected).
- `GET /api/v1/products/{product}`: Get a specific product (protected).
- `POST /api/v1/products`: Create a new product (protected).
- `PUT /api/v1/products/{product}`: Update a product (protected).
- `DELETE /api/v1/products/{product}`: Delete a product (protected).                                                                                  Make sure to include the required authentication token in the request headers for the protected endpoints.

## API Documentation

The API is documented using Swagger. You can access the API documentation by navigating to the `/api/documentation` endpoint in your browser when the application is running.

## Testing

The project includes unit tests to ensure the functionality of the API. You can run the tests using the following command:

```bash
php artisan test
```

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
