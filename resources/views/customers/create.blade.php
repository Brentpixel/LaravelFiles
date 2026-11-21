<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
</head>
<body>
@include('partials.nav')
<div class="form-wrap">
    <div class="page-header">
        <h2>Add Customer</h2>
        <a href="{{ route('customers.index') }}" class="back-link">← Back</a>
    </div>
    <div class="card">
        @if(session('success'))<div class="flash-success">{{ session('success') }}</div>@endif
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name <span style="color:#fb7185">*</span></label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="{{ $errors->has('full_name')?'is-invalid':'' }}" placeholder="e.g. Alice Santos">
                @error('full_name')<p class="error-msg">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address <span style="color:#fb7185">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email')?'is-invalid':'' }}" placeholder="e.g. alice@example.com">
                @error('email')<p class="error-msg">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. 09171234567">
                <p class="form-hint">Optional</p>
            </div>
            <div style="margin-top:28px">
                <button type="submit" class="btn-primary">Save Customer</button>
                <a href="{{ route('customers.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA8</footer>
</body></html>
