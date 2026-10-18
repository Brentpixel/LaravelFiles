<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About – FirstLaravel</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; color: #333; }
        header { background: #2d6cdf; color: #fff; padding: 16px 32px; display: flex; align-items: center; justify-content: space-between; }
        header h1 { font-size: 1.4rem; font-weight: 700; letter-spacing: 1px; }
        nav a { color: #cfe0ff; text-decoration: none; margin-left: 20px; font-size: 0.95rem; font-weight: 500; transition: color .2s; }
        nav a:hover, nav a.active { color: #fff; text-decoration: underline; }
        main { max-width: 860px; margin: 60px auto; padding: 0 24px; }
        .card { background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,.08); padding: 40px; }
        .card h2 { font-size: 2rem; color: #2d6cdf; margin-bottom: 16px; }
        .card p  { line-height: 1.7; color: #555; font-size: 1.05rem; margin-bottom: 12px; }
        footer { text-align: center; padding: 28px; color: #999; font-size: .85rem; margin-top: 60px; }
    </style>
</head>
<body>
<header>
    <h1>FirstLaravel</h1>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}" class="active">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>
<main>
    <div class="card">
        <h2>About This App</h2>
        <p>FirstLaravel is a beginner-friendly demo project built with <strong>Laravel 9</strong>. It demonstrates how to define routes, create controllers, pass data to Blade views, and apply simple navigation.</p>
        <p>All data is stored in static PHP arrays inside the controllers — no database is used for the account pages.</p>
        <p><strong>Framework:</strong> Laravel 9 &nbsp;|&nbsp; <strong>PHP:</strong> 8.0+</p>
    </div>
</main>
<footer>&copy; {{ date('Y') }} FirstLaravel Demo</footer>
</body>
</html>
