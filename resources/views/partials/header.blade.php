<header class="navbar navbar-expand-lg navbar-dark bg-dark px-3 shadow-sm">
    <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">
        <i class="bi bi-box-seam me-1"></i> {{ config('app.name') }}
    </a>

    {{-- Mobile toggle for the sidebar menu --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle fs-5 me-2"></i>
                <span>{{ auth()->user()->name }}</span>
                <span class="badge bg-primary ms-2">{{ auth()->user()->roleLabel() }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><span class="dropdown-item-text small text-muted">{{ auth()->user()->email }}</span></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

{{-- Offcanvas copy of the sidebar for small screens --}}
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileNav">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body sidebar w-100">
        @include('partials.nav-links')
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
    </div>
</div>
