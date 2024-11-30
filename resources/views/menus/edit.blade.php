@extends('layouts.app')

@section('content')
<div class="edit-menu-container">
    <div class="edit-menu-header">
        <h1><i class="fas fa-utensils"></i> Edit Menu Item</h1>
        <p class="text-muted">Edit the menu item details</p>
    </div>

    <div class="content-row">
        <div class="col-md-8">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <h5 for="name">Menu Item Name</h5>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <h5 for="price">Price</h5>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" required>{{ $menu->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<style>
.edit-menu-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.edit-menu-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.edit-menu-header h1 {
    font-size: 24px;
    color: #333;
}

.edit-menu-header h1 i{
    margin-right: 10px;
    color: #4CAF50;
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

.btn {
    width: 150px;
}
</style>
@endsection


