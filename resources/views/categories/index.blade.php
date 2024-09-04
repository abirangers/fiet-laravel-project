@extends('layouts.app')

@section("title", "Categories")

@section("content")
    <div class="container">
        <h1 class="text-center my-4">Ini Halaman Category</h1>
        <a href="{{ route("categories.create")}} " class="btn btn-primary mb-2">Tambah Category</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route("categories.edit", $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route("categories.destroy", $category->id) }}" method="POST" class="d-inline">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('message') }}'
        });
        @endif
    </script>
@endsection
