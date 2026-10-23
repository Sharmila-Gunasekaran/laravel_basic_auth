{{-- Laravel automatically renders this view for abort(403) --}}
@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('title', 'Access Denied')

@section('content')
<div class="text-center py-5">
    <i class="bi bi-shield-lock text-danger" style="font-size: 4rem"></i>
    <h1 class="display-6 mt-3">403 &middot; Access Denied</h1>
    <p class="text-muted mb-4">{{ $exception->getMessage() ?: 'You do not have permission to access this page.' }}</p>
    <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="btn btn-primary">
        <i class="bi bi-house"></i> Go to {{ auth()->check() ? 'Dashboard' : 'Login' }}
    </a>
</div>
@endsection
