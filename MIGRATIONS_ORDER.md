# Database Migrations Execution Order

This document lists all database migrations in the order they will be executed.

## Migration Execution Order

Migrations are executed in chronological order based on their timestamp prefix:

1. **2014_10_12_000000_create_users_table.php**
   - **Table:** `users`
   - **Purpose:** Core user authentication table
   - **Fields:**
     - `id` (bigint, primary key, auto-increment)
     - `name` (string)
     - `email` (string, unique)
     - `email_verified_at` (timestamp, nullable)
     - `password` (string)
     - `remember_token` (string, nullable)
     - `created_at` (timestamp)
     - `updated_at` (timestamp)

2. **2014_10_12_100000_create_password_resets_table.php**
   - **Table:** `password_resets`
   - **Purpose:** Store password reset tokens
   - **Fields:**
     - `email` (string, primary key)
     - `token` (string)
     - `created_at` (timestamp, nullable)

3. **2019_08_19_000000_create_failed_jobs_table.php**
   - **Table:** `failed_jobs`
   - **Purpose:** Store failed queue jobs for debugging
   - **Fields:**
     - `id` (bigint, primary key, auto-increment)
     - `uuid` (string, unique)
     - `connection` (text)
     - `queue` (text)
     - `payload` (longtext)
     - `exception` (longtext)
     - `failed_at` (timestamp)

4. **2019_12_14_000001_create_personal_access_tokens_table.php**
   - **Table:** `personal_access_tokens`
   - **Purpose:** API authentication tokens (Laravel Sanctum)
   - **Fields:**
     - `id` (bigint, primary key, auto-increment)
     - `tokenable_type` (string) - Polymorphic relation type
     - `tokenable_id` (bigint) - Polymorphic relation ID
     - `name` (string)
     - `token` (string, 64 characters, unique)
     - `abilities` (text, nullable)
     - `last_used_at` (timestamp, nullable)
     - `expires_at` (timestamp, nullable)
     - `created_at` (timestamp)
     - `updated_at` (timestamp)
   - **Indexes:**
     - Composite index on `tokenable_type` and `tokenable_id`

5. **2025_11_15_111524_create_sessions_table.php**
   - **Table:** `sessions`
   - **Purpose:** Store user sessions (when using database session driver)
   - **Fields:**
     - `id` (string, primary key) - Session ID
     - `user_id` (bigint, nullable, indexed) - Foreign key to users table
     - `ip_address` (string, 45 characters, nullable) - IPv4 or IPv6 address
     - `user_agent` (text, nullable) - Browser user agent string
     - `payload` (longtext) - Serialized session data
     - `last_activity` (integer, indexed) - Unix timestamp of last activity

## Running Migrations

To run all migrations in order:

```bash
php artisan migrate
```

To see the status of migrations:

```bash
php artisan migrate:status
```

## Database Schema Relationships

```
users (1) ──< (many) sessions
  │
  └── (1) ──< (many) personal_access_tokens
```

- One user can have many sessions
- One user can have many personal access tokens
- Password resets are independent (email-based, not user ID based)

## Notes

- The `sessions` table is optional and only needed if you set `SESSION_DRIVER=database` in your `.env` file
- By default, Laravel uses file-based sessions (`SESSION_DRIVER=file`)
- The `password_resets` table uses email as the primary key (not user_id) to support password resets even if user account is deleted
- All tables use `utf8mb4` character set and `utf8mb4_unicode_ci` collation (MySQL default in Laravel)

