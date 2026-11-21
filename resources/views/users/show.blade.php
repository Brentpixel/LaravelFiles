@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User #{{ $user->id }} – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
    <style>
        .show-wrap { max-width: 540px; margin: 52px auto; padding: 0 28px; }
        .avatar-lg {
            width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#e11d48,#7c3aed);
            display:flex;align-items:center;justify-content:center;font-size:2rem;font-weight:700;
            color:#fff;margin:0 auto 24px;border:2px solid #3d2545;
        }
        .avatar-lg img { width:90px;height:90px;border-radius:50%;object-fit:cover; }
        .info-row { display:flex;gap:10px;background:#241a38;border:1px solid #3d2545;border-radius:8px;padding:12px 18px;margin-bottom:10px; }
        .info-label { font-size:.72rem;text-transform:uppercase;letter-spacing:1.1px;color:#6b4e82;min-width:90px; }
        .info-value { font-size:.95rem;color:#e9d5ff;font-weight:500; }
    </style>
</head>
<body>
@include('partials.nav')
<div class="show-wrap">
    <div class="page-header">
        <h2>User Detail</h2>
        <a href="{{ route('users.index') }}" class="back-link">← Back</a>
    </div>
    <div class="card" style="text-align:center">
        @if($user->avatar && Storage::disk('public')->exists($user->avatar))
            <div class="avatar-lg"><img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->full_name }}"></div>
        @else
            @php $i = collect(explode(' ', $user->full_name))->map(fn($w)=>strtoupper($w[0]??''))->take(2)->implode('') @endphp
            <div class="avatar-lg">{{ $i }}</div>
        @endif
        <div style="text-align:left">
            <div class="info-row"><span class="info-label">ID</span><span class="info-value">#{{ $user->id }}</span></div>
            <div class="info-row"><span class="info-label">Username</span><span class="info-value">@{{ $user->username }}</span></div>
            <div class="info-row"><span class="info-label">Full Name</span><span class="info-value">{{ $user->full_name }}</span></div>
            <div class="info-row"><span class="info-label">Email</span><span class="info-value">{{ $user->email ?: '—' }}</span></div>
        </div>
        <div style="margin-top:24px;text-align:left">
            <a href="{{ route('users.edit', $user) }}" class="btn-primary" style="text-decoration:none;padding:10px 24px;border-radius:8px;font-size:.9rem;">Edit</a>
        </div>
    </div>
</div>
<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA8</footer>
</body></html>
