# FirstLaravel — IT0049 TSA3

**Tasks for Today Management System** built with Laravel 9 and MySQL.

---

## Developer

| Field    | Value         |
|----------|---------------|
| Name     | Brent Verdera |
| Username | bverdera      |
| Subject  | IT0049 – Web Development (TSA3) |

---

## Pages

| URL          | Description                                      |
|--------------|--------------------------------------------------|
| `/`          | **Welcome** – Today's tasks with status summary  |
| `/tasks`     | **Task List** – All tasks grouped and ordered by date |
| `/profile`   | **Profile** – The seeded developer user record   |
| `/about`     | **About** – Static developer info page           |
| `/customers` | Customer list (TSA1/TSA2)                        |
| `/users`     | User accounts list (TSA1/TSA2)                   |

---

## Requirements

- PHP 8.0+
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
DB_DATABASE=firstlaravel
DB_USERNAME=root
DB_PASSWORD=
```

Create the database in phpMyAdmin (or MySQL CLI):

```sql
CREATE DATABASE firstlaravel;
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

This runs:
- `CustomerSeeder` — 6 customer records
- `UserSeeder` — 7 user records (including the developer profile `bverdera`)
- `TaskSeeder` — 9 tasks spread across 4 dates relative to today

To reset and re-seed in one command:

```bash
php artisan migrate:fresh --seed
```

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

| Column      | Type    | Notes                       |
|-------------|---------|-----------------------------|
| `id`        | bigint  | Primary key, auto-increment |
| `title`     | string  |                             |
| `status`    | string  | Default: `pending`          |
| `task_date` | date    |                             |
| `created_at`| timestamp |                           |
| `updated_at`| timestamp |                           |

### `users`

| Column      | Type    | Notes                       |
|-------------|---------|-----------------------------|
| `id`        | bigint  | Primary key                 |
| `username`  | string  | Unique                      |
| `full_name` | string  |                             |
| `name`      | string  |                             |
| `email`     | string  | Unique                      |
| `password`  | string  | Hashed                      |
| `created_at`| timestamp |                           |
| `updated_at`| timestamp |                           |

---

## MVC Structure

```
app/
  Http/Controllers/
    TaskController.php   ← welcome(), index(), profile()
    PageController.php   ← about()
    CustomerController.php
    UserController.php
  Models/
    Task.php
    User.php
    Customer.php

database/
  migrations/
    2026_11_10_000001_create_tasks_table.php
  seeders/
    TaskSeeder.php
    UserSeeder.php
    CustomerSeeder.php
    DatabaseSeeder.php

resources/views/
  welcome.blade.php   ← /
  tasks.blade.php     ← /tasks
  profile.blade.php   ← /profile
  about.blade.php     ← /about
  customers.blade.php ← /customers
  users.blade.php     ← /users

routes/
  web.php
```

---

## License

MIT
