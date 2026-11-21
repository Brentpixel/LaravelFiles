# FirstLaravel — IT0049 TFA8

**Locking It Down: Resource Controllers and Authentication in Laravel.**
Built with Laravel 9 and MySQL. Extends TFA7 with resource controllers, auth middleware, and login/logout.

---

## Developer

| Field    | Value         |
|----------|---------------|
| Name     | Brent Verdera |
| Username | bverdera      |
| Subject  | IT0049 – Web Development |

---

## Pages & Routes

> **Auth required:** `/customers/*` and `/users/*` and `/profile` are protected by the `auth` middleware.
> Visiting them while logged out redirects to `/login`.

| URL                              | Method        | Auth? | Description                                        |
|----------------------------------|---------------|-------|----------------------------------------------------|
| `/`                              | GET           | No    | **Welcome** – Today's tasks with status summary    |
| `/tasks`                         | GET           | No    | **Task List** – All tasks grouped by date          |
| `/about`                         | GET           | No    | **About** – Static developer info page             |
| `/login`                         | GET           | No    | **Login** – Login form                             |
| `/login`                         | POST          | No    | Submit credentials → redirects to `/`              |
| `/logout`                        | POST          | Yes   | Destroy session → redirects to `/login`            |
| `/profile`                       | GET           | Yes   | **Profile** – The seeded developer user record     |
| `/customers`                     | GET           | Yes   | **Customer List** – All customers                  |
| `/customers/create`              | GET           | Yes   | **Add Customer** – Create form with validation     |
| `/customers`                     | POST          | Yes   | Store new customer                                 |
| `/customers/{customer}`          | GET           | Yes   | **Customer Detail**                                |
| `/customers/{customer}/edit`     | GET           | Yes   | **Edit Customer** – Pre-filled edit form           |
| `/customers/{customer}`          | PUT/PATCH     | Yes   | Update customer                                    |
| `/customers/{customer}`          | DELETE        | Yes   | Delete customer                                    |
| `/users`                         | GET           | Yes   | **User List** – All users with avatars             |
| `/users/create`                  | GET           | Yes   | **Add User** – Create form with validation         |
| `/users`                         | POST          | Yes   | Store new user                                     |
| `/users/{user}`                  | GET           | Yes   | **User Detail**                                    |
| `/users/{user}/edit`             | GET           | Yes   | **Edit User** – Pre-filled form + avatar upload    |
| `/users/{user}`                  | PUT/PATCH     | Yes   | Update user + process avatar                       |
| `/users/{user}`                  | DELETE        | Yes   | Delete user + remove avatar file                   |

---

## TFA8 — What Changed

### 1. Resource Controllers
Both `CustomerController` and `UserController` were refactored to full Laravel resource controllers with all 7 conventional methods:
`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.

Routes registered with:
```php
Route::resource('customers', CustomerController::class);
Route::resource('users', UserController::class);
```

### 2. Authentication
- Manual `AuthenticatedSessionController` implements Breeze-compatible login/logout behavior.
- Login form at `/login` with email + password.
- Session-based auth using Laravel's built-in `Auth` facade.
- Passwords stored as bcrypt hashes.

### 3. Auth Middleware Protection
Both resource route groups and `/profile` are wrapped in `middleware('auth')`:
```php
Route::middleware('auth')->group(function () {
    Route::get('/profile', ...);
    Route::resource('customers', CustomerController::class);
    Route::resource('users', UserController::class);
});
```

### 4. Test Login Credentials
| Email                | Password   |
|----------------------|------------|
| brent@example.com    | password   |
| admin@example.com    | password   |

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
    Auth/
      AuthenticatedSessionController.php  ← login (create/store), logout (destroy)
    TaskController.php       ← welcome(), index(), profile()
    PageController.php       ← about()
    CustomerController.php   ← index, create, store, show, edit, update, destroy
    UserController.php       ← index, create, store, show, edit, update, destroy + avatar upload
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
  auth/
    login.blade.php            ← /login
  partials/
    nav.blade.php              ← shared navigation (auth-aware: shows Login or Logout)
    styles.blade.php           ← shared CSS
  customers/
    index.blade.php            ← /customers
    create.blade.php           ← /customers/create
    show.blade.php             ← /customers/{customer}
    edit.blade.php             ← /customers/{customer}/edit
  users/
    index.blade.php            ← /users (with avatar column)
    create.blade.php           ← /users/create
    show.blade.php             ← /users/{user}
    edit.blade.php             ← /users/{user}/edit (avatar upload)
  welcome.blade.php            ← /
  tasks.blade.php              ← /tasks
  profile.blade.php            ← /profile
  about.blade.php              ← /about
  home.blade.php               ← /home

routes/
  web.php

storage/app/public/avatars/   ← uploaded avatar thumbnails (200×200)
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
