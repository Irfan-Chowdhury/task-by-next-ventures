<div align='center'>

# Devskill Task

</div>


## Technologies
- <b>Programming Language:</b> PHP 8.1
- <b>Framework:</b> Laravel 10
- <b>Database:</b> MySQL

## How to run this project

### 1. Clone the Project
```bash
git clone git@github.com:Irfan-Chowdhury/task-by-next-ventures.git
cd <repository_directory>
``` 

### 2. Install dependencies: 
```bash
composer install
```

### 3. Set up your `.env` file and configure the database:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Run migrations: 
```bash
php artisan migrate
```

### 5. Seeder 
```bash
php artisan db:seed
```

### 6. Create a personal access token client 
```bash
php artisan  passport:client --personal
```

After run this command a question will be apeared to select a name for the personal access client. Set a name as your choice.

<img src="https://snipboard.io/hxTBL8.jpg" />

### 7. Run the development server:
```bash
php artisan serve
```

## Credentials 

- Username : admin
- Password : admin123
