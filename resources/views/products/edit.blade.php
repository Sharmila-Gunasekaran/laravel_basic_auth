@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<h1 class="h3 mb-3">Edit: {{ $product->name }}</h1>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')
            @include('products._form')
            <div class="mt-4">
                <button class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
                <a href="{{ route('products.show', $product) }}" class="btn btn-light">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
