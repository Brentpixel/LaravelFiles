@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts – FirstLaravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @include('partials.styles')
</head>
<body>
@include('partials.nav')
<main>
    <div class="page-title">
        <h2>Customer Accounts</h2>
        <span class="record-count">{{ $customers->count() }} records</span>
        <a href="{{ route('customers.create') }}" class="btn-add">+ Add Customer</a>
    </div>
    @if(session('success'))<div class="flash-success">{{ session('success') }}</div>@endif
    @if($customers->isEmpty())
        <p class="empty-msg">No customer records found.</p>
    @else
    <table>
        <thead><tr><th>#</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($customers as $c)
        <tr>
            <td><span class="badge-id">{{ $c->id }}</span></td>
            <td><a href="{{ route('customers.show', $c) }}" style="color:#c9a8e8;text-decoration:none;">{{ $c->full_name }}</a></td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->phone }}</td>
            <td>
                <a href="{{ route('customers.edit', $c) }}" class="btn-sm">Edit</a>
                <form method="POST" action="{{ route('customers.destroy', $c) }}" style="display:inline" onsubmit="return confirm('Delete this customer?')">
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
