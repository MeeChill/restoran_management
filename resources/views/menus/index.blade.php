@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Menu</h1>

    @if (Auth::user()->role === 'admin')
        <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Menu</a>
    @endif

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                @if (Auth::user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ number_format($menu->price, 2) }}</td>
                    <td>{{ $menu->category->category_name }}</td>
                    <td>{{ $menu->description }}</td>
                    @if (Auth::user()->role === 'admin')
                        <td>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
