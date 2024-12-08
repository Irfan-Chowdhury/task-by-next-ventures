<div align='center'>

# User Role and Permission Management API

</div>


## Description

A RESTful API built using Laravel and **Laravel Passport** for secure token-based authentication. It includes dynamic management of users, roles, and permissions. The API is designed with scalability, security, and best practices in mind, implementing **Repository Pattern** and **Spatie Laravel-Permission** for Role-Based Access Control (RBAC).

## Features
- **Secure Authentication:** Implemented with Laravel Passport for API token management.
- **Role-Based Access Control:** Dynamic roles and permissions using Spatie's Laravel Permission package.
- **Repository Pattern:** Ensures clean, maintainable, and testable code.
- **Middleware Authorization:** Access control using custom middleware for route protection.
- **API Resource Endpoints:** Provides clean, standardized JSON responses.

## Technologies
- **Programming Language:** PHP 8.1
- **Framework:** Laravel 10.x
- **Authentication:** Laravel Passport
- **Role/Permission Management:** Spatie Laravel-Permission
- **Database:** MySQL
- **Code Design:** Repository Design Pattern
- **Testing:** Postman for API Testing


## Project Installation Guideline

### 1. Clone the Project
```bash
git clone git@github.com:Irfan-Chowdhury/user-role-and-permission-management-api.git
cd <repository_directory>
``` 

### 2. Install dependencies: 
```bash
composer install
```

### 3. Setup environment variables:
- Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```
- Update database and Passport credentials in the .`env` file:
    ```bash
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

### 4. Generate application key:
```bash
php artisan key:generate
```

### 5. Run migrations: 
```bash
php artisan migrate
```

### 6. Seeder 
```bash
php artisan db:seed
```

### 7. Create a personal access token client 
```bash
php artisan passport:client --personal
```

After run this command a question will be apeared to select a name for the personal access client. Set a name as your choice.

<img src="https://snipboard.io/hxTBL8.jpg" />

### 9. Run the development server:
```bash
php artisan serve
```

The API will now be available at http://127.0.0.1:8000

## User Login Credentials 

- **Email** : admin@gmail.com
- **Password** : admin123



## API Endpoints

Here are the available endpoints with their descriptions.

### Authentication

| **Method** | **Endpoint**    | **Description**            |
|------------|-----------------|----------------------------|
| POST       | `/api/login`    | Login and get access token |
| POST       | `/api/logout`   | Logout user                |


### User Management

| Method   | Endpoint            | Description                     |
|----------|---------------------|---------------------------------|
| GET      | `/api/users`        | Retrieve all users              |
| POST     | `/api/users`        | Create a new user               |
| GET      | `/api/users/{user}` | Get details of a specific user  |
| PATCH    | `/api/users/{user}` | Update a user's information     |
| DELETE   | `/api/users/{user}` | Delete a specific user          |
        

### Role Management

| Method   | Endpoint                     | Description                                 |
|----------|------------------------------|---------------------------------------------|
| GET      | `/api/roles`                 | Retrieve all roles                          |
| POST     | `/api/roles`                 | Create a new role                           |
| GET      | `/api/roles/{role}`          | Get details of a specific role              |
| PATCH    | `/api/roles/{role}`          | Update a specific role                      |
| DELETE   | `/api/roles/{role}`          | Delete a specific role                      |


### Permission Management

| Method   | Endpoint                     | Description                                 |
|----------|------------------------------|---------------------------------------------|
| GET      | `/api/permissions`           | Retrieve all permissions                    |


### Assign Permissions To A Specific Role

| Method   | Endpoint                     | Description                                 |
|----------|------------------------------|---------------------------------------------|
| GET      | `/api/assign-permissions-to-role` | Assign selected permissions into a Specific Role|


## API Documentation
Please click the [API Documentation](https://documenter.getpostman.com/view/34865364/2sAYBd67NJ) link to check overall details for this User Managemnet API. 


<!-- ## Testing with Postman
1. Import the provided Postman collection into your Postman tool.
2. Update the Authorization Bearer token under the **Authorization** tab.
3. Test all the endpoints mentioned above. -->

## Error Handling
The API includes proper error handling with meaningful HTTP status codes:
- **403 Forbidden:** Unauthorized access.
- **404 Not Found:** Resource not found.
- **422 Unprocessable Entity:** Validation errors.
- **500 Error:** Internal Server error.

## Author
- **Name :** Md Irfan Chowdhury.
- **Email :** irfanchowdhury80@gmail.com
- **LinkedIn :** https://www.linkedin.com/in/irfan-chowdhury
