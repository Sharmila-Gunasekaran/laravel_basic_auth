@extends('layouts.app')

@section('title', 'Users')

@section('content')
<h1 class="h3 mb-3">Users</h1>

<div class="card border-0 shadow-sm">
    <table class="table align-middle mb-0">
        <thead class="table-light"><tr><th>Name</th><th>Email</th><th>Role</th></tr></thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge {{ $user->isAdmin() ? 'bg-danger' : 'bg-info text-dark' }}">{{ $user->roleLabel() }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
