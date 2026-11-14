@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: #130f1c; color: #e9d5ff; min-height: 100vh; }

        header {
            background: #1d162c; border-bottom: 1px solid #2e2040;
            padding: 16px 40px; display: flex; align-items: center;
            justify-content: space-between; position: sticky; top: 0; z-index: 100;
            box-shadow: 0 4px 24px rgba(0,0,0,.5);
        }
        header h1 { font-size: 1.3rem; font-weight: 700; color: #e9d5ff; letter-spacing: .5px; }
        header h1 span { color: #fb7185; }
        nav a { color: #8b6aaa; text-decoration: none; margin-left: 28px; font-size: .88rem; font-weight: 500; transition: color .2s; }
        nav a:hover { color: #e9d5ff; }
        nav a.active { color: #fb7185; border-bottom: 2px solid #fb7185; padding-bottom: 2px; }

        main { max-width: 620px; margin: 52px auto; padding: 0 28px; }

        .page-header { margin-bottom: 28px; display: flex; align-items: center; gap: 14px; }
        .page-header h2 { font-size: 1.5rem; font-weight: 700; color: #e9d5ff; }
        .back-link {
            font-size: .82rem; color: #8b6aaa; text-decoration: none;
            border: 1px solid #3d2545; border-radius: 8px; padding: 5px 12px; transition: color .2s, border-color .2s;
        }
        .back-link:hover { color: #e9d5ff; border-color: #8b6aaa; }

        .card {
            background: #1d162c; border: 1px solid #2e2040;
            border-radius: 14px; padding: 36px; box-shadow: 0 8px 40px rgba(0,0,0,.5);
        }

        .flash-success {
            background: rgba(74,222,128,.1); border: 1px solid rgba(74,222,128,.3);
            color: #4ade80; border-radius: 8px; padding: 12px 16px; margin-bottom: 20px; font-size: .9rem;
        }

        .form-group { margin-bottom: 22px; }
        label { display: block; font-size: .78rem; font-weight: 600; letter-spacing: 1px;
                text-transform: uppercase; color: #8b6aaa; margin-bottom: 8px; }

        input[type="text"], input[type="email"] {
            width: 100%; background: #241a38; border: 1px solid #3d2545;
            border-radius: 8px; padding: 11px 14px; color: #e9d5ff;
            font-family: inherit; font-size: .93rem; transition: border-color .2s;
        }
        input:focus { outline: none; border-color: #fb7185; }
        input.is-invalid { border-color: #f87171; }

        .error-msg { margin-top: 6px; font-size: .8rem; color: #f87171; }
        .form-hint { margin-top: 5px; font-size: .78rem; color: #6b4e82; }

        /* Avatar section */
        .avatar-section {
            display: flex; align-items: center; gap: 20px; margin-bottom: 10px;
        }
        .avatar-preview {
            width: 72px; height: 72px; border-radius: 50%;
            object-fit: cover; border: 2px solid #3d2545;
            background: #241a38;
        }
        .avatar-placeholder {
            width: 72px; height: 72px; border-radius: 50%;
            background: linear-gradient(135deg, #e11d48, #7c3aed);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; font-weight: 700; color: #fff;
            border: 2px solid #3d2545; flex-shrink: 0;
        }
        .file-input-wrapper { flex: 1; }

        input[type="file"] {
            width: 100%; background: #241a38; border: 1px dashed #3d2545;
            border-radius: 8px; padding: 10px 14px; color: #c9a8e8;
            font-family: inherit; font-size: .88rem; cursor: pointer;
        }
        input[type="file"].is-invalid { border-color: #f87171; }
        input[type="file"]:focus { outline: none; border-color: #fb7185; }

        .btn-primary {
            background: linear-gradient(135deg, #e11d48, #fb7185);
            color: #fff; border: none; border-radius: 8px; padding: 11px 26px;
            font-family: inherit; font-size: .92rem; font-weight: 600;
            cursor: pointer; transition: opacity .2s;
        }
        .btn-primary:hover { opacity: .88; }
        .btn-secondary { color: #8b6aaa; text-decoration: none; font-size: .9rem; margin-left: 16px; }
        .btn-secondary:hover { color: #e9d5ff; }

        footer { text-align: center; padding: 32px; color: #3d2545; font-size: .8rem; margin-top: 60px; border-top: 1px solid #1d162c; }
    </style>
</head>
<body>
<header>
    <h1>First<span>Laravel</span></h1>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('tasks') }}">All Tasks</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}" class="active">Users</a>
    </nav>
</header>

<main>
    <div class="page-header">
        <h2>Edit User</h2>
        <a href="{{ route('users') }}" class="back-link">← Back to list</a>
    </div>

    <div class="card">
        @if (session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        {{-- enctype required for file upload --}}
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Username --}}
            <div class="form-group">
                <label for="username">Username <span style="color:#fb7185">*</span></label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username', $user->username) }}"
                    class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
                >
                @error('username')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            {{-- Full Name --}}
            <div class="form-group">
                <label for="full_name">Full Name <span style="color:#fb7185">*</span></label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="{{ old('full_name', $user->full_name) }}"
                    class="{{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                >
                @error('full_name')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                >
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            {{-- Avatar Upload --}}
            <div class="form-group">
                <label>Profile Picture</label>
                <div class="avatar-section">
                    @if ($user->avatar && Storage::disk('public')->exists($user->avatar))
                        <img
                            src="{{ asset('storage/' . $user->avatar) }}"
                            alt="Current avatar"
                            class="avatar-preview"
                        >
                    @else
                        @php
                            $initials = collect(explode(' ', $user->full_name))
                                ->map(fn($w) => strtoupper($w[0] ?? ''))
                                ->take(2)
                                ->implode('');
                        @endphp
                        <div class="avatar-placeholder">{{ $initials }}</div>
                    @endif

                    <div class="file-input-wrapper">
                        <input
                            type="file"
                            id="avatar"
                            name="avatar"
                            accept="image/*"
                            class="{{ $errors->has('avatar') ? 'is-invalid' : '' }}"
                        >
                    </div>
                </div>
                @error('avatar')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
                <p class="form-hint">Optional. JPG, PNG, GIF, or WebP — max 2 MB. Will be cropped to a 200×200 thumbnail.</p>
            </div>

            <div style="margin-top:28px">
                <button type="submit" class="btn-primary">Update User</button>
                <a href="{{ route('users') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</main>

<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA7</footer>
</body>
</html>

