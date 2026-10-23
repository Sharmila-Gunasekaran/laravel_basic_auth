<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | {{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; background: #f5f6fa; }
        .app-wrapper { flex: 1; display: flex; }
        .sidebar { width: 240px; flex-shrink: 0; background: #1f2937; }
        .sidebar .nav-link { color: #cbd5e1; border-radius: .4rem; padding: .55rem .9rem; }
        .sidebar .nav-link:hover { background: #374151; color: #fff; }
        .sidebar .nav-link.active { background: #2563eb; color: #fff; }
        .sidebar .section-label { color: #6b7280; font-size: .72rem; letter-spacing: .06em; text-transform: uppercase; }
        .main-content { flex: 1; min-width: 0; padding: 1.5rem; }
        @media (max-width: 991.98px) { .sidebar { display: none; } }
    </style>
    @stack('styles')
</head>
<body>
    @include('partials.header')

    <div class="app-wrapper">
        @include('partials.sidebar')

        <main class="main-content">
            @include('partials.alerts')
            @yield('content')
        </main>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
