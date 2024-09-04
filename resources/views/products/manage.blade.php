@extends('layouts.app')

@section('title')
    {{ isset($product) ? 'Edit Product' : 'Create Product' }}
@endsection

@section('content')
    <div class="container my-4">
        <h1 class="text-center">{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h1>
        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
            @if (isset($product))
                @method('PUT')
            @endif
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ isset($product) ? $product->description : '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price-display" value="{{ isset($product) ? number_format($product->price, 0, ',', '.') : '' }}">
                <input type="hidden" id="price" name="price" value="{{ isset($product) ? number_format($product->price, 0, ',', '.') : '' }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ isset($product) ? $product->stock : '' }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            <a href="{{ route("products.index") }}" class="btn btn-secondary mb-2">
                Back
            </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceDisplayInput = document.querySelector('#price-display');
            const priceInput = document.querySelector('#price');

            function formatPriceInput() {
                const value = this.value.replace(/[^0-9]/g, '');
                priceInput.value = value;
                this.value = value ? new Intl.NumberFormat('id-ID').format(value) : '';
            }

            priceDisplayInput.addEventListener('input', formatPriceInput);
            priceDisplayInput.addEventListener('focus', function() {
                this.value = priceInput.value;
            });
            priceDisplayInput.addEventListener('blur', formatPriceInput);

            @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
            });
            @endif
        });
    </script>
@endsection
