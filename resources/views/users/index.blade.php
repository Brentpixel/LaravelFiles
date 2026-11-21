@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
</head>
<body>
@include('partials.nav')
<main>
    <div class="page-title">
        <h2>User Accounts</h2>
        <span class="record-count">{{ $users->count() }} records</span>
        <a href="{{ route('users.create') }}" class="btn-add">+ Add User</a>
    </div>
    @if(session('success'))<div class="flash-success">{{ session('success') }}</div>@endif
    @if($users->isEmpty())
        <p class="empty-msg">No user records found.</p>
    @else
    <table>
        <thead><tr><th>#</th><th>Avatar</th><th>Username</th><th>Full Name</th><th>Email</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($users as $u)
        <tr>
            <td><span class="badge-id">{{ $u->id }}</span></td>
            <td>
                @if($u->avatar && Storage::disk('public')->exists($u->avatar))
                    <img src="{{ asset('storage/' . $u->avatar) }}" alt="{{ $u->full_name }}" class="avatar-img">
                @else
                    @php $i = collect(explode(' ', $u->full_name))->map(fn($w)=>strtoupper($w[0]??''))->take(2)->implode('') @endphp
                    <span class="avatar-sm">{{ $i }}</span>
                @endif
            </td>
            <td>{{ $u->username }}</td>
            <td><a href="{{ route('users.show', $u) }}" style="color:#c9a8e8;text-decoration:none;">{{ $u->full_name }}</a></td>
            <td>{{ $u->email }}</td>
            <td>
                <a href="{{ route('users.edit', $u) }}" class="btn-sm">Edit</a>
                <form method="POST" action="{{ route('users.destroy', $u) }}" style="display:inline" onsubmit="return confirm('Delete this user?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-sm danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</main>
<footer>&copy; {{ date('Y') }} FirstLaravel &mdash; TFA8</footer>
</body></html>
