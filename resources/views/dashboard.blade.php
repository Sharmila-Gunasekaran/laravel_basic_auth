@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="h3 mb-4">Welcome, {{ auth()->user()->name }}</h1>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm"><div class="card-body">
            <div class="text-muted small">Products</div>
            <div class="fs-3 fw-semibold">{{ $productCount }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm"><div class="card-body">
            <div class="text-muted small">Units in stock</div>
            <div class="fs-3 fw-semibold">{{ number_format($stockTotal) }}</div>
        </div></div>
    </div>
    @if (auth()->user()->isAdmin())
        <div class="col-md-4">
            <div class="card border-0 shadow-sm"><div class="card-body">
                <div class="text-muted small">Users</div>
                <div class="fs-3 fw-semibold">{{ $userCount }}</div>
            </div></div>
        </div>
    @endif
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold">Latest products</div>
    <ul class="list-group list-group-flush">
        @forelse ($latestProducts as $product)
            <li class="list-group-item d-flex justify-content-between">
                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                <span class="text-muted">{{ number_format($product->price, 2) }}</span>
            </li>
        @empty
            <li class="list-group-item text-muted">No products yet.</li>
        @endforelse
    </ul>
</div>
@endsection
