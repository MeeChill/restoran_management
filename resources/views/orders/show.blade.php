@extends('layouts.app')

@section('content')
<div class="show-order-container">
    <div class="show-order-header">
        <h1><i class="fas fa-shopping-cart"></i> Order Details</h1>
        <p class="text-muted">Details of the order</p>
    </div>

    <div class="content-row">
        <div class="col-md-8">
            <div class="order-info">
                <h5>Order ID: {{ $order->id }}</h5>
                <p><strong>Ordered by:</strong> {{ $order->customer_name }}</p>
                <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
            </div>

            <h5 class="mt-4">Menu Items</h5>
            <div class="menu-items-container">
                @if($order->orderItems && $order->orderItems->isNotEmpty())
                    <ul class="list-group">
                        @foreach($order->orderItems as $orderItem)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">{{ $orderItem->menu->name }}</h6>
                                    <h6 class="mb-1">Rp {{ number_format($orderItem->menu->price, 0, ',', '.') }}</h6>
                                    <small>Quantity: {{ $orderItem->quantity }}</small>
                                </div>
                                <span class="">Rp {{ number_format($orderItem->subtotal, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No menu items found for this order.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="order-total">
        <h5 class="mt-4">Total Price: <span class="text-success">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></h5>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary m-3">Back</a>
</div>

<style>
.show-order-container {
    padding: 0 20px 0 20px;
    background-color: #f8f9fa;
}

.show-order-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.show-order-header h1 {
    font-size: 24px;
    color: #333;
    margin: 0;
}

.show-order-header h1 i {
    margin-right: 10px;
    color: #007bff;
}

.content-row {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.order-info {
    margin-bottom: 20px;
}

.menu-items-container {
    margin-top: 10px;
}

.order-total {
    margin-top: 20px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.btn {
    width: 150px;
}
</style>
@endsection
