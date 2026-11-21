@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
</head>
<body>
@include('partials.nav')
<div class="form-wrap">
    <div class="page-header">
        <h2>Edit User</h2>
        <a href="{{ route('users.index') }}" class="back-link">← Back</a>
    </div>
    <div class="card">
        @if(session('success'))<div class="flash-success">{{ session('success') }}</div>@endif
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="username">Username <span style="color:#fb7185">*</span></label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="{{ $errors->has('username')?'is-invalid':'' }}">
                @error('username')<p class="error-msg">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label for="full_name">Full Name <span style="color:#fb7185">*</span></label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" class="{{ $errors->has('full_name')?'is-invalid':'' }}">
                @error('full_name')<p class="error-msg">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="{{ $errors->has('email')?'is-invalid':'' }}">
                @error('email')<p class="error-msg">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>Profile Picture</label>
                <div class="avatar-section">
                    @if($user->avatar && Storage::disk('public')->exists($user->avatar))
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Current avatar" class="avatar-preview">
                    @else
                        @php $i = collect(explode(' ', $user->full_name))->map(fn($w)=>strtoupper($w[0]??''))->take(2)->implode('') @endphp
                        <div class="avatar-placeholder">{{ $i }}</div>
                    @endif
                    <div style="flex:1">
                        <input type="file" id="avatar" name="avatar" accept="image/*" class="{{ $errors->has('avatar')?'is-invalid':'' }}">
                    </div>
                </div>
                @error('avatar')<p class="error-msg">{{ $message }}</p>@enderror
                <p class="form-hint">Optional. JPG, PNG, GIF, WebP — max 2 MB. Cropped to 200×200.</p>
            </div>
            <div style="margin-top:28px">
                <button type="submit" class="btn-primary">Update User</button>
                <a href="{{ route('users.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA8</footer>
</body></html>
