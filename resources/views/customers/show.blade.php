<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer #{{ $customer->id }} – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
    <style>
        .show-wrap { max-width: 540px; margin: 52px auto; padding: 0 28px; }
        .info-row { display:flex; gap:10px; background:#241a38; border:1px solid #3d2545; border-radius:8px; padding:12px 18px; margin-bottom:10px; }
        .info-label { font-size:.72rem; text-transform:uppercase; letter-spacing:1.1px; color:#6b4e82; min-width:90px; }
        .info-value { font-size:.95rem; color:#e9d5ff; font-weight:500; }
    </style>
</head>
<body>
@include('partials.nav')
<div class="show-wrap">
    <div class="page-header">
        <h2>Customer Detail</h2>
        <a href="{{ route('customers.index') }}" class="back-link">← Back</a>
    </div>
    <div class="card">
        <div class="info-row"><span class="info-label">ID</span><span class="info-value">#{{ $customer->id }}</span></div>
        <div class="info-row"><span class="info-label">Full Name</span><span class="info-value">{{ $customer->full_name }}</span></div>
        <div class="info-row"><span class="info-label">Email</span><span class="info-value">{{ $customer->email }}</span></div>
        <div class="info-row"><span class="info-label">Phone</span><span class="info-value">{{ $customer->phone ?: '—' }}</span></div>
        <div style="margin-top:24px">
            <a href="{{ route('customers.edit', $customer) }}" class="btn-primary" style="text-decoration:none;padding:10px 24px;border-radius:8px;font-size:.9rem;">Edit</a>
        </div>
    </div>
</div>
<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA8</footer>
</body></html>
