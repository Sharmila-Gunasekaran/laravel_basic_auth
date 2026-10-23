@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<h1 class="h3 mb-3">Add Product</h1>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            @include('products._form')
            <div class="mt-4">
                <button class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
