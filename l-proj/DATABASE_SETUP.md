# Database Setup Guide

This guide will help you set up the database connection and run all migrations for this Laravel project.

## Prerequisites

- PHP 8.0.2 or higher
- MySQL/MariaDB database server
- Composer installed
- Laravel 9.x

## Step 1: Configure Database Connection

1. Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

2. Generate application key:
   ```bash
   php artisan key:generate
   ```

3. Edit the `.env` file and update the database configuration:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

## Step 2: Create Database

Create a new MySQL database using one of these methods:

**Using MySQL Command Line:**
```bash
mysql -u root -p
CREATE DATABASE laravel_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

**Using phpMyAdmin:**
- Log in to phpMyAdmin
- Click "New" to create a new database
- Name it `laravel_db` (or your preferred name)
- Set collation to `utf8mb4_unicode_ci`
- Click "Create"

## Step 3: Run Migrations

Run all migrations to create the database tables:

```bash
php artisan migrate
```

This will create the following tables:
- `users` - User accounts and authentication
- `password_resets` - Password reset tokens
- `failed_jobs` - Failed queue jobs
- `personal_access_tokens` - API authentication tokens (Sanctum)
- `sessions` - Session storage (if using database sessions)

## Step 4: Seed Database (Optional)

To populate the database with initial data, including a default admin user:

```bash
php artisan db:seed
```

Default admin credentials:
- Email: `admin@example.com`
- Password: `password`

**⚠️ Important:** Change the default password after first login!

## Step 5: Verify Database Connection

Test the database connection:

```bash
php artisan tinker
```

Then in tinker:
```php
DB::connection()->getPdo();
// Should return: PDO object
```

Or check if users table exists:
```php
Schema::hasTable('users');
// Should return: true
```

## Migration Files Overview

The following migration files are included in this project:

1. **2014_10_12_000000_create_users_table.php**
   - Creates the `users` table
   - Fields: id, name, email, email_verified_at, password, remember_token, timestamps

2. **2014_10_12_100000_create_password_resets_table.php**
   - Creates the `password_resets` table
   - Fields: email (primary), token, created_at

3. **2019_08_19_000000_create_failed_jobs_table.php**
   - Creates the `failed_jobs` table
   - Fields: id, uuid, connection, queue, payload, exception, failed_at

4. **2019_12_14_000001_create_personal_access_tokens_table.php**
   - Creates the `personal_access_tokens` table (for Laravel Sanctum)
   - Fields: id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, timestamps

5. **2025_11_15_111524_create_sessions_table.php**
   - Creates the `sessions` table (for database session driver)
   - Fields: id (primary), user_id, ip_address, user_agent, payload, last_activity

## Troubleshooting

### Error: "Access denied for user"
- Check your database credentials in `.env`
- Ensure the database user has proper permissions

### Error: "Unknown database"
- Make sure the database exists
- Verify the database name in `.env` matches the created database

### Error: "Table already exists"
- Run `php artisan migrate:fresh` to drop all tables and re-run migrations
- **Warning:** This will delete all existing data!

### Error: "Migration table not found"
- Run `php artisan migrate:install` first
- Then run `php artisan migrate`

## Additional Commands

**Reset and re-run all migrations:**
```bash
php artisan migrate:fresh
```

**Reset, re-run migrations, and seed:**
```bash
php artisan migrate:fresh --seed
```

**Rollback last migration:**
```bash
php artisan migrate:rollback
```

**Rollback all migrations:**
```bash
php artisan migrate:reset
```

**Check migration status:**
```bash
php artisan migrate:status
```

## Database Structure

After running migrations, your database will have the following structure:

```
laravel_db
├── users
├── password_resets
├── failed_jobs
├── personal_access_tokens
└── sessions
```

## Next Steps

1. Update the default admin password
2. Configure your application settings
3. Set up additional models and migrations as needed
4. Configure email settings if using password reset functionality

