@extends('layouts.app')

@section('content')
<div class="order-container">
    <div class="page-header">
        <h1><i class="fas fa-shopping-cart"></i> Order Management</h1>
        @if (Auth::user()->role === 'staff')
        <div class="header-actions">
            <a href="{{ route('orders.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Create New Order
            </a>
        </div>
        @endif
    </div>

    <div class="card order-list-card">
        <div class="card-header">
            <h3>All Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Items</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->order_date}}</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-info">
                                    {{ $order->orderItems->count() }} Item(s)
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="no-data-placeholder">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>No orders found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.order-container {
    background-color: #f8f9fa;
    padding: 20px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.page-header h1 {
    margin: 0;
    color: #333;
    font-size: 24px;
}

.page-header h1 i {
    margin-right: 10px;
    color: #F44336;
}

.header-actions .btn {
    display: flex;
    align-items: center;
}

.header-actions .btn i {
    margin-right: 5px;
}

.order-list-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.order-list-card .card-header {
    background: linear-gradient(45deg, #F44336, #E57373);
    color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.table-responsive {
    max-height: 600px;
    overflow-y: auto;
}

.no-data-placeholder {
    text-align: center;
    padding: 50px;
    color: #999;
}

.no-data-placeholder i {
    font-size: 64px;
    margin-bottom: 20px;
    color: #ddd;
}

.btn-group .btn {
    padding: 5px 10px;
}
</style>
@endsection
