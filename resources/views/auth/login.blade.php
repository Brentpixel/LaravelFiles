<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: #130f1c;
            color: #e9d5ff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-wrap { width: 100%; max-width: 420px; padding: 24px; }
        .brand { text-align: center; margin-bottom: 32px; }
        .brand h1 { font-size: 1.6rem; font-weight: 700; color: #e9d5ff; }
        .brand h1 span { color: #fb7185; }
        .brand p { margin-top: 6px; font-size: .88rem; color: #8b6aaa; }

        .card {
            background: #1d162c; border: 1px solid #2e2040;
            border-radius: 14px; padding: 36px; box-shadow: 0 8px 40px rgba(0,0,0,.5);
        }

        .form-group { margin-bottom: 20px; }
        label {
            display: block; font-size: .75rem; font-weight: 600;
            letter-spacing: 1px; text-transform: uppercase; color: #8b6aaa; margin-bottom: 8px;
        }
        input[type="email"], input[type="password"] {
            width: 100%; background: #241a38; border: 1px solid #3d2545;
            border-radius: 8px; padding: 11px 14px; color: #e9d5ff;
            font-family: inherit; font-size: .93rem; transition: border-color .2s;
        }
        input:focus { outline: none; border-color: #fb7185; }
        input.is-invalid { border-color: #f87171; }
        .error-msg { margin-top: 6px; font-size: .8rem; color: #f87171; }

        .remember-row {
            display: flex; align-items: center; gap: 8px; margin-bottom: 24px;
        }
        .remember-row input[type="checkbox"] { accent-color: #fb7185; }
        .remember-row label {
            font-size: .85rem; text-transform: none; letter-spacing: 0; color: #c9a8e8; margin: 0;
        }

        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, #e11d48, #fb7185);
            color: #fff; border: none; border-radius: 8px; padding: 12px;
            font-family: inherit; font-size: .95rem; font-weight: 600;
            cursor: pointer; transition: opacity .2s;
        }
        .btn-primary:hover { opacity: .88; }
    </style>
</head>
<body>
<div class="login-wrap">
    <div class="brand">
        <h1>First<span>Laravel</span></h1>
        <p>Sign in to manage customers and users.</p>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    autofocus
                    autocomplete="email"
                >
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    autocomplete="current-password"
                >
                @error('password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn-primary">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>
