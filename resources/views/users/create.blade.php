@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="container my-4">
        <h1 class="text-center">Create New Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                <a href="{{ route("products.index") }}" class="btn btn-secondary mb-2">
                    Back
                </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
        });
        @endif
    </script>
@endsection
