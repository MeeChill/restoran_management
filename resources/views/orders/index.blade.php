@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Pesanan</h1>

    @if (Auth::user()->role === 'staff')
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Tambah Pesanan</a>
    @endif

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nama Pelanggan</th>
                <th>Total Harga</th>
                <th>Tanggal Pesanan</th>
                @if (Auth::user()->role === 'staff')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ number_format($order->total_price, 2) }}</td>
                    <td>{{ $order->order_date }}</td>
                    @if (Auth::user()->role === 'staff')
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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
