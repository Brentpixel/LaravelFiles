<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home – FirstLaravel</title>
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

        header h1 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #e9d5ff;
            letter-spacing: 0.5px;
        }

        header h1 span { color: #fb7185; }

        nav a {
            color: #8b6aaa;
            text-decoration: none;
            margin-left: 28px;
            font-size: 0.88rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            transition: color .2s;
        }

        nav a:hover { color: #e9d5ff; }

        nav a.active {
            color: #fb7185;
            border-bottom: 2px solid #fb7185;
            padding-bottom: 2px;
        }

        main {
            max-width: 860px;
            margin: 60px auto;
            padding: 0 28px;
        }

        .card {
            background: #1d162c;
            border: 1px solid #2e2040;
            border-radius: 12px;
            box-shadow: 0 8px 40px rgba(0,0,0,.5);
            padding: 48px;
        }

        .card h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #e9d5ff;
            margin-bottom: 16px;
        }

        .card h2 span { color: #fb7185; }

        .card p {
            line-height: 1.8;
            color: #c9a8e8;
            font-size: 1.02rem;
        }

        .divider {
            width: 48px;
            height: 3px;
            background: linear-gradient(90deg, #fb7185, transparent);
            border-radius: 2px;
            margin: 16px 0 20px;
        }

        footer {
            text-align: center;
            padding: 32px;
            color: #3d2545;
            font-size: .8rem;
            margin-top: 60px;
            border-top: 1px solid #1d162c;
        }
    </style>
</head>
<body>
<header>
    <h1>First<span>Laravel</span></h1>
    <nav>
        <a href="{{ route('home') }}" class="active">Home</a>
        <a href="{{ route('tasks') }}">All Tasks</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>
<main>
    <div class="card">
        <h2>Welcome to <span>FirstLaravel</span></h2>
        <div class="divider"></div>
        <p>This is a simple Laravel 9 demo application built to showcase basic routing, controllers, and Blade views. Use the navigation links above to explore the pages.</p>
    </div>
</main>
<footer>&copy; {{ date('Y') }} FirstLaravel Demo</footer>
</body>
</html>
