<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #130f1c;
            color: #e9d5ff;
            min-height: 100vh;
        }

        header {
            background: #1d162c;
            border-bottom: 1px solid #2e2040;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 24px rgba(0,0,0,.5);
        }

        header h1 { font-size: 1.3rem; font-weight: 700; color: #e9d5ff; letter-spacing: 0.5px; }
        header h1 span { color: #fb7185; }

        nav a {
            color: #8b6aaa; text-decoration: none; margin-left: 28px;
            font-size: 0.88rem; font-weight: 500; letter-spacing: 0.3px; transition: color .2s;
        }
        nav a:hover { color: #e9d5ff; }
        nav a.active { color: #fb7185; border-bottom: 2px solid #fb7185; padding-bottom: 2px; }

        main { max-width: 860px; margin: 60px auto; padding: 0 28px; }

        .card {
            background: #1d162c; border: 1px solid #2e2040;
            border-radius: 12px; box-shadow: 0 8px 40px rgba(0,0,0,.5); padding: 48px;
        }

        .card h2 { font-size: 2rem; font-weight: 700; color: #e9d5ff; margin-bottom: 16px; }
        .divider {
            width: 48px; height: 3px;
            background: linear-gradient(90deg, #fb7185, transparent);
            border-radius: 2px; margin: 16px 0 24px;
        }
        .card p { line-height: 1.8; color: #c9a8e8; font-size: 1.02rem; margin-bottom: 14px; }
        .card p:last-child { margin-bottom: 0; }
        .card strong { color: #fb7185; font-weight: 600; }

        .developer-box {
            margin-top: 32px;
            background: #241a38;
            border: 1px solid #3d2545;
            border-radius: 12px;
            padding: 28px 32px;
        }
        .developer-box h3 {
            font-size: 0.72rem; font-weight: 600; letter-spacing: 1.4px;
            text-transform: uppercase; color: #8b6aaa; margin-bottom: 16px;
        }
        .dev-row {
            display: flex; align-items: center; gap: 10px; margin-bottom: 10px;
        }
        .dev-row:last-child { margin-bottom: 0; }
        .dev-label {
            font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1.1px;
            color: #6b4e82; min-width: 80px;
        }
        .dev-value { font-size: 0.95rem; color: #e9d5ff; font-weight: 500; }

        .meta-row {
            display: inline-flex; gap: 8px; align-items: center;
            background: #241a38; border: 1px solid #3d2545;
            border-radius: 8px; padding: 10px 18px; font-size: 0.88rem;
            color: #c9a8e8; margin-top: 8px;
        }
        .meta-row span { color: #fb7185; font-weight: 600; }

        footer {
            text-align: center; padding: 32px; color: #3d2545;
            font-size: .8rem; margin-top: 60px; border-top: 1px solid #1d162c;
        }
    </style>
</head>
<body>
<header>
    <h1>First<span>Laravel</span></h1>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('tasks') }}">All Tasks</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('about') }}" class="active">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>

<main>
    <div class="card">
        <h2>About This App</h2>
        <div class="divider"></div>
        <p>
            <strong>FirstLaravel</strong> is a beginner-friendly demo project built with
            <strong>Laravel 9</strong>. It demonstrates routing, controllers, Eloquent ORM models,
            database migrations, seeders, and Blade views.
        </p>
        <p>
            The <strong>IT0049 TSA3</strong> activity — <em>Tasks for Today Management System</em>
            — extends the project with a <code>tasks</code> table, task filtering by date,
            and a developer profile page.
        </p>
        <div class="meta-row">
            <span>Framework:</span> Laravel 9 &nbsp;|&nbsp;
            <span>PHP:</span> 8.0+ &nbsp;|&nbsp;
            <span>Activity:</span> IT0049 TSA3
        </div>

        <div class="developer-box">
            <h3>Developer</h3>
            <div class="dev-row">
                <span class="dev-label">Name</span>
                <span class="dev-value">Brent Verdera</span>
            </div>
            <div class="dev-row">
                <span class="dev-label">Username</span>
                <span class="dev-value">bverdera</span>
            </div>
            <div class="dev-row">
                <span class="dev-label">Email</span>
                <span class="dev-value">brent@example.com</span>
            </div>
            <div class="dev-row">
                <span class="dev-label">Subject</span>
                <span class="dev-value">IT0049 – Web Development</span>
            </div>
        </div>
    </div>
</main>

<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TSA3</footer>
</body>
</html>
