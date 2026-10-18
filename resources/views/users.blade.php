<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts – FirstLaravel</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; color: #333; }
        header { background: #2d6cdf; color: #fff; padding: 16px 32px; display: flex; align-items: center; justify-content: space-between; }
        header h1 { font-size: 1.4rem; font-weight: 700; letter-spacing: 1px; }
        nav a { color: #cfe0ff; text-decoration: none; margin-left: 20px; font-size: 0.95rem; font-weight: 500; transition: color .2s; }
        nav a:hover, nav a.active { color: #fff; text-decoration: underline; }
        main { max-width: 960px; margin: 48px auto; padding: 0 24px; }
        main h2 { font-size: 1.7rem; color: #2d6cdf; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,.08); overflow: hidden; }
        thead { background: #2d6cdf; color: #fff; }
        thead th { padding: 14px 18px; text-align: left; font-size: 0.9rem; letter-spacing: 0.5px; }
        tbody tr { border-bottom: 1px solid #eef0f4; transition: background .15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f0f5ff; }
        tbody td { padding: 13px 18px; font-size: 0.95rem; color: #444; }
        .badge-id   { display: inline-block; background: #e8f0fe; color: #2d6cdf; border-radius: 12px; padding: 2px 10px; font-size: 0.82rem; font-weight: 600; }
        .badge-active   { display: inline-block; background: #d4edda; color: #155724; border-radius: 12px; padding: 2px 10px; font-size: 0.82rem; font-weight: 600; }
        .badge-inactive { display: inline-block; background: #f8d7da; color: #721c24; border-radius: 12px; padding: 2px 10px; font-size: 0.82rem; font-weight: 600; }
        footer { text-align: center; padding: 28px; color: #999; font-size: .85rem; margin-top: 60px; }
    </style>
</head>
<body>
<header>
    <h1>FirstLaravel</h1>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}" class="active">Users</a>
    </nav>
</header>
<main>
    <h2>User Accounts</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td><span class="badge-id">{{ $user['id'] }}</span></td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['role'] }}</td>
                <td>
                    @if ($user['status'] === 'Active')
                        <span class="badge-active">Active</span>
                    @else
                        <span class="badge-inactive">Inactive</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
<footer>&copy; {{ date('Y') }} FirstLaravel Demo</footer>
</body>
</html>
