@php($user = auth()->user())
<ul class="nav flex-column gap-1">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
    </li>

    @if ($user->hasRole('admin', 'product_manager'))
        <li class="section-label mt-3 mb-1 px-2">Products</li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.index', 'products.show', 'products.edit') ? 'active' : '' }}">
                <i class="bi bi-list-ul me-2"></i> All Products
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.create') }}" class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}">
                <i class="bi bi-plus-circle me-2"></i> Add Product
            </a>
        </li>
    @endif

    @if ($user->isAdmin())
        <li class="section-label mt-3 mb-1 px-2">Administration</li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Users
            </a>
        </li>
    @endif
</ul>
