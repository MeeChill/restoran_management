@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Order Details</h1>
        <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
        <p><strong>Total Price:</strong> {{ $order->total_price }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
        <h3>Order Items</h3>
        <ul class="list-group">
            @foreach ($order->orderItems as $item)
                <li class="list-group-item">{{ $item->menu->name }} - Quantity: {{ $item->quantity }} - Subtotal: {{ $item->subtotal }}</li>
            @endforeach
        </ul>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Order List</a>
    </div>
</div>
@endsection
