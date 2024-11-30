@extends('layouts.app')

@section('content')
<div class="create-order-container">
    <div class="create-order-header">
        <h1><i class="fas fa-shopping-cart"></i> Create Order</h1>
        <p class="text-muted">Create a new order</p>
    </div>

    <div class="content-row">
        <div class="col-md-8">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <h5 for="customer_name">Customer Name</h5>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>

                <h5>Select Menu Items</h5>
                <div id="menu-items-container">
                    <div class="menu-item">
                        <select class="form-control" name="menu_items[0][id]" required>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                        <input type="number" class="form-control" name="menu_items[0][quantity]" placeholder="Quantity" min="1" required>
                        <button type="button" class="btn btn-danger remove-menu-item">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-success add-menu-item">Add Menu Item</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary m-3">Back</a>
            </form>
        </div>
    </div>
</div>

<style>
.btn {
    width: 150px;
}

.create-order-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.create-order-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.create-order-header h1 {
    font-size: 24px;
    color: #333;
    margin: 0;
}

.create-order-header h1 i {
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

.form-group {
    margin-bottom: 20px;
}

.form-control {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.menu-item {
    display: grid;
    gap: 10px;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.menu-item select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.menu-item input[type="number"] {
    width: 100px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.menu-item button[type="button"] {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}

.btn .remove-menu-item {
    background: #ff69b4;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn .remove-menu-item:hover {
    background: #ff3737;
}
</style>

<script>
    document.querySelector('.add-menu-item').addEventListener('click', function() {
        const menuItemsContainer = document.getElementById('menu-items-container');
        const index = menuItemsContainer.children.length;
        const newItem = `
            <div class="menu-item mb-2">
                <select class="form-control" name="menu_items[${index}][id]" required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</option>
                    @endforeach
                </select>
                <input type="number" class="form-control" name="menu_items[${index}][quantity]" placeholder="Quantity" min="1" required>
                <button type="button" class="btn btn-danger remove-menu-item">Remove</button>
            </div>
        `;
        menuItemsContainer.insertAdjacentHTML('beforeend', newItem);
    });

    document.getElementById('menu-items-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-menu-item')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection
