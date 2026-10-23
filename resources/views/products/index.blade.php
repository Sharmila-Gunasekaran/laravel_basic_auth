@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Product</a>
</div>

<form method="GET" class="mb-3" style="max-width: 360px">
    <div class="input-group">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search name or SKU">
        <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
    </div>
</form>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th><th>Name</th><th>SKU</th><th class="text-end">Price</th><th class="text-end">Stock</th><th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><code>{{ $product->sku }}</code></td>
                        <td class="text-end">{{ number_format($product->price, 2) }}</td>
                        <td class="text-end">{{ $product->stock }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-secondary" title="View"><i class="bi bi-eye"></i></a>

                            {{-- Edit/Delete are admin-only (routes are also protected by middleware) --}}
                            @if (auth()->user()->isAdmin())
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No products found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $products->links('pagination::bootstrap-5') }}</div>
@endsection
