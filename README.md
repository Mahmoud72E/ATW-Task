# Laravel mini-CRM System
###  that allows administrators to manage companies and their employees.
This project implements a basic Laravel authentication system with CRUD functionality for Companies and Employees. It allows administrators to log in and perform operations such as creating, updating, and deleting companies and employees. The project also supports multi-language functionality and pagination.

## Features

- User authentication with administrators role
- CRUD functionality for Companies and Employees
- Database migrations for creating schemas
- Database seeds to create the initial administrator user
- Basic Laravel resource controllers for Companies and Employees
- Validation using Laravel's Request classes
- Pagination for Companies and Employees lists
- Multi-language support
- File storage for company logos

## Technologies Used

- Laravel 10
- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Bootstrap
- jQuery
- Font Awesome

## Technologies Used In Laravel

- Breeze to Make Auth
- mcamara/laravel-localization To Transalet

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Mahmoud72E/ATW-Task.git

2. Navigate to the project directory:
    ```bash
    cd laravel-authentication-system

3. Install the dependencies:
    ```bash
    composer install

4. Create a new MySQL database for the project.

5. Copy the .env.example file to .env:
    ```bash
    cp .env.example .env

6. Update the .env file with your database credentials and other necessary configurations.

7. Generate an application key:
    ```bash
    php artisan key:generate

8. Run the database migrations and seed the initial data:
    ```bash
    php artisan migrate --seed

9. Create a symbolic link to the storage directory:
    ```bash
    php artisan storage:link

10. Start the development server:
    ```bash
    php artisan serve

11. Open your web browser and access the application at http://localhost:8000.

## Usage
Visit the login page and log in using the provided administrator credentials: admin@admin.com and password.
Once logged in, you can perform CRUD operations for Companies and Employees from the dashboard.
The Companies and Employees pages display lists with pagination, and you can click on the links to view details, edit, or delete individual records.
The system supports multi-language functionality. Language files are stored in the lang directory, and you can add translations as needed.
Company logos should be stored in the storage/app/public directory, and the project has a symbolic link to the public/storage directory to make them accessible.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License.
