<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome – Tasks for Today</title>
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
            color: #8b6aaa;
            text-decoration: none;
            margin-left: 28px;
            font-size: 0.88rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            transition: color .2s;
        }
        nav a:hover { color: #e9d5ff; }
        nav a.active { color: #fb7185; border-bottom: 2px solid #fb7185; padding-bottom: 2px; }

        main { max-width: 900px; margin: 52px auto; padding: 0 28px; }

        .page-header { margin-bottom: 32px; }
        .page-header h2 { font-size: 1.9rem; font-weight: 700; color: #e9d5ff; }
        .page-header h2 span { color: #fb7185; }
        .page-header p { margin-top: 8px; color: #8b6aaa; font-size: 0.9rem; }

        .divider {
            width: 48px; height: 3px;
            background: linear-gradient(90deg, #fb7185, transparent);
            border-radius: 2px; margin: 14px 0 28px;
        }

        .summary-bar {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .stat {
            background: #1d162c;
            border: 1px solid #2e2040;
            border-radius: 10px;
            padding: 14px 22px;
            text-align: center;
            min-width: 110px;
        }
        .stat .num { font-size: 1.8rem; font-weight: 700; color: #fb7185; }
        .stat .lbl { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1.2px; color: #8b6aaa; margin-top: 4px; }

        .task-list { display: flex; flex-direction: column; gap: 12px; }

        .task-card {
            background: #1d162c;
            border: 1px solid #2e2040;
            border-radius: 10px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: border-color .2s, box-shadow .2s;
        }
        .task-card:hover { border-color: #3d2545; box-shadow: 0 4px 20px rgba(0,0,0,.4); }

        .task-card.completed { opacity: 0.65; }

        .status-dot {
            width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0;
        }
        .dot-pending    { background: #facc15; box-shadow: 0 0 6px rgba(250,204,21,.5); }
        .dot-completed  { background: #4ade80; box-shadow: 0 0 6px rgba(74,222,128,.5); }
        .dot-in-progress{ background: #60a5fa; box-shadow: 0 0 6px rgba(96,165,250,.5); }

        .task-title { flex: 1; font-size: 0.97rem; color: #e9d5ff; font-weight: 500; }
        .task-card.completed .task-title { text-decoration: line-through; color: #6b4e82; }

        .badge {
            padding: 3px 11px;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: capitalize;
        }
        .badge-pending    { background: rgba(250,204,21,.12); color: #facc15; border: 1px solid rgba(250,204,21,.3); }
        .badge-completed  { background: rgba(74,222,128,.12); color: #4ade80; border: 1px solid rgba(74,222,128,.3); }
        .badge-in-progress{ background: rgba(96,165,250,.12); color: #60a5fa; border: 1px solid rgba(96,165,250,.3); }

        .empty-msg {
            text-align: center; padding: 60px; color: #4a3560; font-size: 0.95rem;
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
        <a href="{{ route('home') }}" class="active">Home</a>
        <a href="{{ route('tasks') }}">All Tasks</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>

<main>
    <div class="page-header">
        <h2>Tasks for <span>Today</span></h2>
        <div class="divider"></div>
        <p>{{ \Carbon\Carbon::today()->format('l, F j, Y') }}</p>
    </div>

    @php
        $total     = $tasks->count();
        $done      = $tasks->where('status', 'completed')->count();
        $pending   = $tasks->where('status', 'pending')->count();
        $inProg    = $tasks->where('status', 'in-progress')->count();
    @endphp

    @if ($total > 0)
        <div class="summary-bar">
            <div class="stat"><div class="num">{{ $total }}</div><div class="lbl">Total</div></div>
            <div class="stat"><div class="num">{{ $done }}</div><div class="lbl">Done</div></div>
            <div class="stat"><div class="num">{{ $inProg }}</div><div class="lbl">In Progress</div></div>
            <div class="stat"><div class="num">{{ $pending }}</div><div class="lbl">Pending</div></div>
        </div>

        <div class="task-list">
            @foreach ($tasks as $task)
                @php $s = $task->status; @endphp
                <div class="task-card {{ $s === 'completed' ? 'completed' : '' }}">
                    <span class="status-dot
                        @if($s === 'completed')   dot-completed
                        @elseif($s === 'in-progress') dot-in-progress
                        @else dot-pending
                        @endif">
                    </span>
                    <span class="task-title">{{ $task->title }}</span>
                    <span class="badge
                        @if($s === 'completed')   badge-completed
                        @elseif($s === 'in-progress') badge-in-progress
                        @else badge-pending
                        @endif">
                        {{ $s }}
                    </span>
                </div>
            @endforeach
        </div>
    @else
        <p class="empty-msg">No tasks scheduled for today.</p>
    @endif
</main>

<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TSA3</footer>
</body>
</html>
