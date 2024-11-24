@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center">Add Order</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" name="customer_name" required>
            </div>
            <h3>Select Menu Items</h3>
            @foreach ($menus as $menu)
                <div class="form-group">
                    <label>{{ $menu->name }} - {{ $menu->price }}</label>
                    <input type="number" class="form-control" name="menu_items[{{ $menu->id }}][quantity]" placeholder="Quantity" min="1">
                    <input type="hidden" name="menu_items[{{ $menu->id }}][id]" value="{{ $menu->id }}">
                </div>
            @endforeach
            <button type="submit" class="btn btn-success btn-block">Add Order</button>
        </form>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-block mt-2">Back to Order List</a>
    </div>
</div>
@endsection
