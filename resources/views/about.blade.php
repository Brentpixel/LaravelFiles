<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
    <style>
        main { max-width: 860px; margin: 60px auto; }
        .card { background: #1d162c; border: 1px solid #2e2040; border-radius: 12px; box-shadow: 0 8px 40px rgba(0,0,0,.5); padding: 48px; }
        .card h2 { font-size: 2rem; font-weight: 700; color: #e9d5ff; margin-bottom: 16px; }
        .divider { width: 48px; height: 3px; background: linear-gradient(90deg, #fb7185, transparent); border-radius: 2px; margin: 16px 0 24px; }
        .card p { line-height: 1.8; color: #c9a8e8; font-size: 1.02rem; margin-bottom: 14px; }
        .card p:last-child { margin-bottom: 0; }
        .card strong { color: #fb7185; font-weight: 600; }
        .developer-box { margin-top: 32px; background: #241a38; border: 1px solid #3d2545; border-radius: 12px; padding: 28px 32px; }
        .developer-box h3 { font-size: 0.72rem; font-weight: 600; letter-spacing: 1.4px; text-transform: uppercase; color: #8b6aaa; margin-bottom: 16px; }
        .dev-row { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
        .dev-row:last-child { margin-bottom: 0; }
        .dev-label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1.1px; color: #6b4e82; min-width: 80px; }
        .dev-value { font-size: 0.95rem; color: #e9d5ff; font-weight: 500; }
        .meta-row { display: inline-flex; gap: 8px; align-items: center; background: #241a38; border: 1px solid #3d2545; border-radius: 8px; padding: 10px 18px; font-size: 0.88rem; color: #c9a8e8; margin-top: 8px; }
        .meta-row span { color: #fb7185; font-weight: 600; }
    </style>
</head>
<body>
@include('partials.nav')

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
