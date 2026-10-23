{{-- Shared fields for create & edit. Expects $product. --}}
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
               class="form-control @error('name') is-invalid @enderror" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="sku">SKU</label>
        <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}"
               class="form-control @error('sku') is-invalid @enderror" required>
        @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="price">Price</label>
        <input type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price', $product->price) }}"
               class="form-control @error('price') is-invalid @enderror" required>
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="stock">Stock</label>
        <input type="number" min="0" id="stock" name="stock" value="{{ old('stock', $product->stock ?? 0) }}"
               class="form-control @error('stock') is-invalid @enderror" required>
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
