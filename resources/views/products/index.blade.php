@extends('layouts.app')

@section("title", "Products")

@section("content")
    <div class="container">
        <h1 class="text-center my-4">Ini Halaman Product</h1>
        <a href="{{ route("products.create")}} " class="btn btn-primary mb-2">Tambah Product</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                    <td>{{ $product->name }}</td>
                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ number_format($product->stock, 0, ',', '.' ) }}</td>
                        <td>
                            <a href="{{ route("products.edit", $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route("products.destroy", $product->id) }}" method="POST" class="d-inline">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No products found</td>
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
