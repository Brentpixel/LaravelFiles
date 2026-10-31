<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts – FirstLaravel</title>
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

        header h1 span {
            color: #fb7185;
        }

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
            max-width: 980px;
            margin: 52px auto;
            padding: 0 28px;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
        }

        .page-title h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #e9d5ff;
        }

        .record-count {
            background: #1d162c;
            color: #fb7185;
            border: 1px solid #3d2545;
            border-radius: 20px;
            padding: 3px 12px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #1d162c;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #2e2040;
            box-shadow: 0 8px 40px rgba(0,0,0,.5);
        }

        thead {
            background: #241a38;
            border-bottom: 1px solid #3d2545;
        }

        thead th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.73rem;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            color: #8b6aaa;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #241a38;
            transition: background .15s;
        }

        tbody tr:last-child { border-bottom: none; }

        tbody tr:hover {
            background: #241a38;
        }

        tbody td {
            padding: 14px 20px;
            font-size: 0.92rem;
            color: #c9a8e8;
        }

        .badge {
            display: inline-block;
            background: linear-gradient(135deg, #e11d48, #fb7185);
            color: #fff;
            border-radius: 20px;
            padding: 3px 11px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 10px rgba(251,113,133,.3);
        }

        .empty-msg {
            text-align: center;
            padding: 60px;
            color: #4a3560;
            font-size: 0.95rem;
            font-style: italic;
            background: #1d162c;
            border: 1px dashed #2e2040;
            border-radius: 12px;
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
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}" class="active">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>
<main>
    <div class="page-title">
        <h2>Customer Accounts</h2>
        <span class="record-count">{{ $customers->count() }} records</span>
    </div>
    @if ($customers->isEmpty())
        <p class="empty-msg">No customer records found.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td><span class="badge">{{ $customer->id }}</span></td>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</main>
<footer>&copy; {{ date('Y') }} FirstLaravel Demo</footer>
</body>
</html>
