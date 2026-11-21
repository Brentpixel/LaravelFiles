<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
    <style>
        main { max-width: 860px; margin: 60px auto; }
        .card { background: #1d162c; border: 1px solid #2e2040; border-radius: 12px; box-shadow: 0 8px 40px rgba(0,0,0,.5); padding: 48px; }
        .card h2 { font-size: 2rem; font-weight: 700; color: #e9d5ff; margin-bottom: 16px; }
        .card h2 span { color: #fb7185; }
        .card p { line-height: 1.8; color: #c9a8e8; font-size: 1.02rem; }
        .divider { width: 48px; height: 3px; background: linear-gradient(90deg, #fb7185, transparent); border-radius: 2px; margin: 16px 0 20px; }
    </style>
</head>
<body>
@include('partials.nav')
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
