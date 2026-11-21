<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
    <style>
        main { max-width: 980px; }
        .date-group { margin-bottom: 32px; }
        .date-heading {
            font-size: 0.75rem; font-weight: 600; letter-spacing: 1.4px;
            text-transform: uppercase; color: #8b6aaa;
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 10px;
        }
        .date-heading::after { content: ''; flex: 1; height: 1px; background: #2e2040; }
        .task-list { display: flex; flex-direction: column; gap: 10px; }
        .task-card {
            background: #1d162c; border: 1px solid #2e2040; border-radius: 10px;
            padding: 16px 20px; display: flex; align-items: center; gap: 14px;
            transition: border-color .2s, box-shadow .2s;
        }
        .task-card:hover { border-color: #3d2545; box-shadow: 0 4px 20px rgba(0,0,0,.4); }
        .task-card.completed { opacity: 0.6; }
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
    </style>
</head>
<body>
@include('partials.nav')

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

