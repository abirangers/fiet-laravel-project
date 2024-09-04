@extends('layouts.app')

@section("title", "User")

@section("content")
    <div class="container">
        <h1 class="text-center my-4">Ini Halaman User</h1>
        <a href="{{ route("products.create")}} " class="btn btn-primary mb-2">Add User</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                    <td>{{ $user->name }}</td>
                        <td>
                            <a href="{{ route("users.edit", $user->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route("users.destroy", $user->id) }}" method="POST" class="d-inline">
                                @method("kdawokdao")
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
