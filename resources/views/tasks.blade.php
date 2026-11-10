<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks – FirstLaravel</title>
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

        main { max-width: 980px; margin: 52px auto; padding: 0 28px; }

        .page-title {
            display: flex; align-items: center; gap: 12px; margin-bottom: 28px;
        }
        .page-title h2 { font-size: 1.6rem; font-weight: 700; color: #e9d5ff; }
        .record-count {
            background: #1d162c; color: #fb7185; border: 1px solid #3d2545;
            border-radius: 20px; padding: 3px 12px; font-size: 0.78rem; font-weight: 600;
        }

        .date-group { margin-bottom: 32px; }
        .date-heading {
            font-size: 0.75rem; font-weight: 600; letter-spacing: 1.4px;
            text-transform: uppercase; color: #8b6aaa;
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 10px;
        }
        .date-heading::after {
            content: ''; flex: 1; height: 1px; background: #2e2040;
        }

        .task-list { display: flex; flex-direction: column; gap: 10px; }

        .task-card {
            background: #1d162c;
            border: 1px solid #2e2040;
            border-radius: 10px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: border-color .2s, box-shadow .2s;
        }
        .task-card:hover { border-color: #3d2545; box-shadow: 0 4px 20px rgba(0,0,0,.4); }
        .task-card.completed { opacity: 0.6; }

        .badge-id {
            display: inline-block;
            background: linear-gradient(135deg, #e11d48, #fb7185);
            color: #fff; border-radius: 20px; padding: 3px 11px;
            font-size: 0.72rem; font-weight: 700; min-width: 32px; text-align: center;
        }

        .status-dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; }
        .dot-pending    { background: #facc15; }
        .dot-completed  { background: #4ade80; }
        .dot-in-progress{ background: #60a5fa; }

        .task-title { flex: 1; font-size: 0.95rem; color: #e9d5ff; }
        .task-card.completed .task-title { text-decoration: line-through; color: #6b4e82; }

        .badge {
            padding: 3px 11px; border-radius: 20px;
            font-size: 0.72rem; font-weight: 600; letter-spacing: 0.5px; text-transform: capitalize;
        }
        .badge-pending    { background: rgba(250,204,21,.12); color: #facc15; border: 1px solid rgba(250,204,21,.3); }
        .badge-completed  { background: rgba(74,222,128,.12); color: #4ade80; border: 1px solid rgba(74,222,128,.3); }
        .badge-in-progress{ background: rgba(96,165,250,.12); color: #60a5fa; border: 1px solid rgba(96,165,250,.3); }

        .empty-msg {
            text-align: center; padding: 60px; color: #4a3560;
            font-size: 0.95rem; font-style: italic;
            background: #1d162c; border: 1px dashed #2e2040; border-radius: 12px;
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
        <a href="{{ route('tasks') }}" class="active">All Tasks</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>
</header>

<main>
    <div class="page-title">
        <h2>All Tasks</h2>
        <span class="record-count">{{ $tasks->count() }} tasks</span>
    </div>

    @if ($tasks->isEmpty())
        <p class="empty-msg">No tasks found.</p>
    @else
        @php $grouped = $tasks->groupBy(fn($t) => $t->task_date->format('Y-m-d')); @endphp

        @foreach ($grouped as $date => $group)
            <div class="date-group">
                <div class="date-heading">
                    {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                    @if ($date === \Carbon\Carbon::today()->toDateString())
                        &nbsp;— Today
                    @endif
                </div>
                <div class="task-list">
                    @foreach ($group as $task)
                        @php $s = $task->status; @endphp
                        <div class="task-card {{ $s === 'completed' ? 'completed' : '' }}">
                            <span class="badge-id">{{ $task->id }}</span>
                            <span class="status-dot
                                @if($s === 'completed')    dot-completed
                                @elseif($s === 'in-progress') dot-in-progress
                                @else dot-pending
                                @endif">
                            </span>
                            <span class="task-title">{{ $task->title }}</span>
                            <span class="badge
                                @if($s === 'completed')    badge-completed
                                @elseif($s === 'in-progress') badge-in-progress
                                @else badge-pending
                                @endif">
                                {{ $s }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</main>

<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TSA3</footer>
</body>
</html>

