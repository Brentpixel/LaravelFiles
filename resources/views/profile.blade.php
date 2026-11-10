<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile – FirstLaravel</title>
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

        main { max-width: 620px; margin: 60px auto; padding: 0 28px; }

        .profile-card {
            background: #1d162c;
            border: 1px solid #2e2040;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(0,0,0,.5);
            padding: 48px;
            text-align: center;
        }

        .avatar {
            width: 90px; height: 90px; border-radius: 50%;
            background: linear-gradient(135deg, #e11d48, #7c3aed);
            display: flex; align-items: center; justify-content: center;
            font-size: 2.2rem; font-weight: 700; color: #fff;
            margin: 0 auto 24px;
            box-shadow: 0 4px 24px rgba(251,113,133,.4);
        }

        .profile-card h2 { font-size: 1.7rem; font-weight: 700; color: #e9d5ff; }

        .username {
            display: inline-block; margin-top: 8px;
            font-size: 0.85rem; color: #8b6aaa; letter-spacing: 0.5px;
        }
        .username::before { content: '@'; }

        .divider {
            width: 48px; height: 3px;
            background: linear-gradient(90deg, #fb7185, transparent);
            border-radius: 2px; margin: 20px auto 24px;
        }

        .info-grid { display: flex; flex-direction: column; gap: 12px; text-align: left; }

        .info-row {
            background: #241a38; border: 1px solid #3d2545;
            border-radius: 8px; padding: 12px 18px;
            display: flex; align-items: center; gap: 10px;
        }
        .info-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1.2px; color: #8b6aaa; min-width: 90px; }
        .info-value { font-size: 0.95rem; color: #e9d5ff; font-weight: 500; }

        .role-badge {
            display: inline-block; margin-top: 20px;
            background: rgba(251,113,133,.12); color: #fb7185;
            border: 1px solid rgba(251,113,133,.3);
            border-radius: 20px; padding: 5px 16px;
            font-size: 0.78rem; font-weight: 600; letter-spacing: 0.5px;
        }

        .empty-msg {
            text-align: center; padding: 60px; color: #4a3560;
            font-style: italic; background: #1d162c;
            border: 1px dashed #2e2040; border-radius: 12px;
        }

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
        <a href="{{ route('profile') }}" class="active">Profile</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>

<main>
    @if ($user)
        @php $initials = collect(explode(' ', $user->full_name))->map(fn($w) => strtoupper($w[0]))->implode(''); @endphp
        <div class="profile-card">
            <div class="avatar">{{ $initials }}</div>
            <h2>{{ $user->full_name }}</h2>
            <span class="username">{{ $user->username }}</span>
            <div class="divider"></div>
            <div class="info-grid">
                <div class="info-row">
                    <span class="info-label">ID</span>
                    <span class="info-value">#{{ $user->id }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ $user->full_name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Username</span>
                    <span class="info-value">@{{ $user->username }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Member Since</span>
                    <span class="info-value">{{ $user->created_at->format('F j, Y') }}</span>
                </div>
            </div>
            <span class="role-badge">Developer</span>
        </div>
    @else
        <p class="empty-msg">No user profile found. Please run the seeder.</p>
    @endif
</main>

<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TSA3</footer>
</body>
</html>

