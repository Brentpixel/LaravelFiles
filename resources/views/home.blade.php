<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home – FirstLaravel</title>
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
        .card p  { line-height: 1.7; color: #555; font-size: 1.05rem; }
        footer { text-align: center; padding: 28px; color: #999; font-size: .85rem; margin-top: 60px; }
    </style>
</head>
<body>
<header>
    <h1>FirstLaravel</h1>
    <nav>
        <a href="{{ route('home') }}" class="active">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>
<main>
    <div class="card">
        <h2>Welcome to FirstLaravel</h2>
        <p>This is a simple Laravel 9 demo application built to showcase basic routing, controllers, and Blade views. Use the navigation links above to explore the pages.</p>
    </div>
</main>
<footer>&copy; {{ date('Y') }} FirstLaravel Demo</footer>
</body>
</html>
