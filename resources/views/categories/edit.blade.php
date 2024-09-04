@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="container my-4">
        <h1 class="text-center">Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            <a href="{{ route("categories.index") }}" class="btn btn-secondary mb-2">
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
