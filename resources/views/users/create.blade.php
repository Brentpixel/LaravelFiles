<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
</head>
<body>
@include('partials.nav')
<div class="form-wrap">
    <div class="page-header">
        <h2>Add User</h2>
        <a href="{{ route('users.index') }}" class="back-link">← Back</a>
    </div>
    <div class="card">
        @if(session('success'))<div class="flash-success">{{ session('success') }}</div>@endif
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username <span style="color:#fb7185">*</span></label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="{{ $errors->has('username')?'is-invalid':'' }}" placeholder="e.g. jdelacruz">
                @error('username')<p class="error-msg">{{ $message }}</p>@enderror
                <p class="form-hint">Must be unique.</p>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name <span style="color:#fb7185">*</span></label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="{{ $errors->has('full_name')?'is-invalid':'' }}" placeholder="e.g. Juan Dela Cruz">
                @error('full_name')<p class="error-msg">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email')?'is-invalid':'' }}" placeholder="e.g. juan@example.com">
                @error('email')<p class="error-msg">{{ $message }}</p>@enderror
                <p class="form-hint">Optional</p>
            </div>
            <div style="margin-top:28px">
                <button type="submit" class="btn-primary">Save User</button>
                <a href="{{ route('users.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA8</footer>
</body></html>
