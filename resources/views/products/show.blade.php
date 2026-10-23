@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">{{ $product->name }}</h1>
    <div>
        <a href="{{ route('products.index') }}" class="btn btn-light"><i class="bi bi-arrow-left"></i> Back</a>
        @if (auth()->user()->isAdmin())
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
        @endif
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">SKU</dt>          <dd class="col-sm-9"><code>{{ $product->sku }}</code></dd>
            <dt class="col-sm-3">Price</dt>        <dd class="col-sm-9">{{ number_format($product->price, 2) }}</dd>
            <dt class="col-sm-3">Stock</dt>        <dd class="col-sm-9">{{ $product->stock }}</dd>
            <dt class="col-sm-3">Description</dt>  <dd class="col-sm-9">{{ $product->description ?: '—' }}</dd>
            <dt class="col-sm-3">Created by</dt>   <dd class="col-sm-9">{{ $product->creator?->name ?? '—' }}</dd>
            <dt class="col-sm-3">Created at</dt>   <dd class="col-sm-9">{{ $product->created_at->format('d M Y, h:i A') }}</dd>
        </dl>
    </div>
</div>
@endsection
