# FirstLaravel — IT0049 TFA7

**Tasks for Today Management System** with Forms, Validation, and File Upload.
Built with Laravel 9 and MySQL.

---

## Developer

| Field    | Value         |
|----------|---------------|
| Name     | Brent Verdera |
| Username | bverdera      |
| Subject  | IT0049 – Web Development |

---

## Pages

| URL                        | Method   | Description                                       |
|----------------------------|----------|---------------------------------------------------|
| `/`                        | GET      | **Welcome** – Today's tasks with status summary   |
| `/tasks`                   | GET      | **Task List** – All tasks grouped by date          |
| `/profile`                 | GET      | **Profile** – The seeded developer user record     |
| `/about`                   | GET      | **About** – Static developer info page             |
| `/customers`               | GET      | **Customer List** – All customers + Add/Edit links |
| `/customers/create`        | GET      | **Add Customer** – Create form with validation     |
| `/customers`               | POST     | Store new customer                                 |
| `/customers/{id}/edit`     | GET      | **Edit Customer** – Pre-filled edit form           |
| `/customers/{id}`          | PUT      | Update customer                                    |
| `/users`                   | GET      | **User List** – All users with avatars             |
| `/users/create`            | GET      | **Add User** – Create form with validation         |
| `/users`                   | POST     | Store new user                                     |
| `/users/{id}/edit`         | GET      | **Edit User** – Pre-filled form + avatar upload    |
| `/users/{id}`              | PUT      | Update user + process avatar                       |

---

## Requirements

- PHP 8.0+ with GD extension enabled
- Composer
- MySQL (via XAMPP or any compatible server)
- Laravel 9

---

## Setup Instructions

### 1. Clone / copy the project

Place the project folder inside `c:\xampp\htdocs\` (or your web root).

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure environment

Copy the example env file and edit your database credentials:

```bash
copy .env.example .env
php artisan key:generate
```

Open `.env` and set:

```ini
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Create the database in phpMyAdmin (or MySQL CLI) if it doesn't exist:

```sql
CREATE DATABASE laravel;
```

### 4. Run migrations

```bash
php artisan migrate
```

To start fresh (drops all tables and re-runs):

```bash
php artisan migrate:fresh
```

### 5. Seed the database

```bash
php artisan db:seed
```

To reset and re-seed in one command:

```bash
php artisan migrate:fresh --seed
```

### 6. Create the storage symlink (required for avatars)

```bash
php artisan storage:link
```

This creates `public/storage` → `storage/app/public` so uploaded avatars are accessible in the browser.

---

## Running the App

### Option A — XAMPP (recommended)

1. Start Apache and MySQL in the XAMPP Control Panel.
2. Open your browser and go to:
   `http://localhost/FirstLaravel-app/public`

### Option B — Laravel dev server

```bash
php artisan serve
```

Then open: `http://localhost:8000`

---

## Database Schema

### `tasks`

| Column      | Type      | Notes                       |
|-------------|-----------|-----------------------------|
| `id`        | bigint    | Primary key, auto-increment |
| `title`     | string    |                             |
| `status`    | string    | Default: `pending`          |
| `task_date` | date      |                             |
| `created_at`| timestamp |                             |
| `updated_at`| timestamp |                             |

### `users`

| Column      | Type      | Notes                       |
|-------------|-----------|-----------------------------|
| `id`        | bigint    | Primary key                 |
| `username`  | string    | Unique                      |
| `full_name` | string    |                             |
| `avatar`    | string    | Nullable – storage path     |
| `name`      | string    |                             |
| `email`     | string    | Unique                      |
| `password`  | string    | Hashed                      |
| `created_at`| timestamp |                             |
| `updated_at`| timestamp |                             |

### `customers`

| Column      | Type      | Notes                       |
|-------------|-----------|-----------------------------|
| `id`        | bigint    | Primary key                 |
| `full_name` | string    |                             |
| `email`     | string    | Unique                      |
| `phone`     | string    |                             |
| `created_at`| timestamp |                             |
| `updated_at`| timestamp |                             |

---

## MVC Structure

```
app/
  Http/Controllers/
    TaskController.php       ← welcome(), index(), profile()
    PageController.php       ← about()
    CustomerController.php   ← index(), create(), store(), edit(), update()
    UserController.php       ← index(), create(), store(), edit(), update() + avatar upload
  Models/
    Task.php
    User.php
    Customer.php

database/
  migrations/
    2026_11_10_000001_create_tasks_table.php
    2026_11_14_000001_add_avatar_to_users_table.php
  seeders/
    TaskSeeder.php
    UserSeeder.php
    CustomerSeeder.php
    DatabaseSeeder.php

resources/views/
  welcome.blade.php          ← /
  tasks.blade.php            ← /tasks
  profile.blade.php          ← /profile
  about.blade.php            ← /about
  customers.blade.php        ← /customers (list)
  customers_create.blade.php ← /customers/create
  customers_edit.blade.php   ← /customers/{id}/edit
  users.blade.php            ← /users (list with avatars)
  users_create.blade.php     ← /users/create
  users_edit.blade.php       ← /users/{id}/edit (with avatar upload)

routes/
  web.php

storage/app/public/avatars/  ← uploaded avatar thumbnails (200×200)
```

---

## Validation Rules

### Customer
- `full_name` — required
- `email` — required, valid email, unique (ignores self on update)
- `phone` — optional

### User
- `username` — required, unique (ignores self on update)
- `full_name` — required
- `email` — optional, valid email
- `avatar` — optional, image, max 2 MB (resized to 200×200 via GD)

---

## Avatar Upload Notes

- Avatars are resized to 200×200 px thumbnails using PHP's built-in GD extension.
- Files are stored on Laravel's `public` disk at `storage/app/public/avatars/`.
- Only the storage path is saved in the database `avatar` column.
- When an avatar is replaced, the old file is automatically deleted.
- The storage symlink (`php artisan storage:link`) must be created for avatars to display.

---

## License

MIT
